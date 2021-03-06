{
    layout:'fit',
    width: 400,
    height: 300,
    closeAction:'close',
    plain: true,
    border: false,
    title: 'Импорт',
    items:
    [
        {
            xtype: 'form',
            itemId: 'form',
            frame: true,
            fileUpload: true,
            labelAlign: 'top',
            items:
            [
                {
                    xtype: 'fileuploadfield',
                    name: 'file',
                    emptyText: 'Выберите файл для импорта...',
                    buttonText: 'Выбрать',
                    anchor: '95%',
                    allowBlank: false,
                    fieldLabel: 'Файл'
                },
                {
                    xtype: 'combo',
                    fieldLabel: 'Действия',
                    anchor: '95%',
                    hiddenName: 'mode',
                    mode: 'local',
                    editable: false,
                    resizable: false,
                    valueField: 'value',
                    displayField: 'display',
                    value: 1,
                    triggerAction: 'all',
                    store:
                    {
                        xtype: 'arraystore',
                        fields: ['value','display'],
                        data:
                        [
                            [1,'добавить'],[2,'заменить все'],[3,'заменить существующие']
                        ]
                    }
                },
                {
                    xtype: 'combo',
                    fieldLabel: 'Разделитель',
                    anchor: '95%',
                    hiddenName: 'delim',
                    mode: 'local',
                    editable: false,
                    resizable: false,
                    valueField: 'value',
                    displayField: 'display',
                    value: 1,
                    triggerAction: 'all',
                    store:
                    {
                        xtype: 'arraystore',
                        fields: ['value','display'],
                        data:
                        [
                            [1,';'],[2,','],[3,'табуляция']
                        ]
                    }
                }
            ]
         }
    ],
    buttonAlign: 'center',
    buttons:
    [
        {
            text: 'Импортировать',
            handler: function(btn)
            {
                var form = this.ownerCt.ownerCt.getComponent('form');
                if(form.getForm().isValid())
                {
                    form.getForm().submit({
                        url: '/ajax/ext/catalog.ext.import',
                        method: 'POST',
                        params:
                        {
                            table_id: '<?=$table_id?>',
                            section_id: '<?=$section_id?>'
                        },
                        waitTitle: 'Подождите',
                        waitMsg: 'Сохранение...',
                        success: function(form, action){
                                btn.ownerCt.ownerCt.hide();
                                var grid = Ext.getCmp('panel-catalog-editor-<?=$section_id?>-tab-position').getComponent('grid');
                                var paging = grid.getBottomToolbar();
                                grid.getStore().load({params:{start:paging.cursor, limit:paging.pageSize}});
                                grid.getSelectionModel().clearSelections();
                            },
                        failure: function(form, action){
                                Ext.MessageBox.alert('Ошибка', action.result.msg);
                            }
                    });
                }
            }
        },
        {
            text: 'Отмена',
            handler: function()
            {
                this.ownerCt.ownerCt.hide();
            }
        }
    ]
}
