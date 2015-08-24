<script>
    $(function () {
		
        var form = ".form-<?= $form->id ?>";       
        $(form).ajaxForm({
            url: 'ajax/forms.show.<?= $args->form ?>',
            data: {
                ajax_form: 1,
                submit_<?= $form->id ?>: 'submit'
            },
            dataType: 'json',
            beforeSubmit: function () {
				$(form).find('input, textarea').removeClass('error');
            },
            success: function (data) {
                if (data.result == 'error') {
                    if (data.errors)
                        $.each(data.errors, function (index, value) {
                            $(form + " [name=" + index + "]").addClass('error');
                        });                  
                } else {
                    $(form).find('input, textarea').removeClass('error');
                    $('.vop .note').hide();
					$('.vop h2').hide();
					$('.thx.note').html(data.message);                  
					$('.thx').show();					
					$(form).remove();					
                    $(form).trigger('reset');
                }
            }
        });
		
    });
</script>
<div class="vop">
	<h2>остались вопросы?</h2>
	<div class="note">Напишите нам!</div>
	<h2 class="thx" style="display:none;">спасибо!</h2>
	<div class="thx note" style="display:none;" >Мы свяжемся с Вами в ближайшее время.</div> <!-- спасибо, менять загаловок, показывать этот блок  искрывать все остальное-->
	<form method="post" action="" class="form-<?= $form->id ?>" id="form_<?= $form->id ?>">  
		<? foreach( $field_rows as $field) : ?>
		 <?

			$css = "";       
			$attr = "";
			$placeholder = "";

			if( $field["nameid"] == "name")
			{
				$css = "";          
			}
			if( $field["nameid"] == "phone")
			{
				$css =  "phoneinput ";          
				$attr = 'pattern="^((\+[7]{1}\([0-9]{3}\)\ [0-9]{3}\-[0-9]{2}\-[0-9]{2}))?$"    maxlength="18"';
				$placeholder = "+7 (_ _ _) _ _ _ - _ _ - _ _";

			}
			if( $field["nameid"] == "email")
			{           
				$css = "email";            
			}
			if( $field["nameid"] == "text")
			{            
				$css = "";            
			}
		?>
			<? if( $field["type_id"] == "text" ) : ?> 
			<div class="row">
				<label><?= $field["name"] ?> <?= ($field["valid_empty"] == 1 ? "*" : "") ?> </label>
				 <input <?= $attr ?> id="<?= $field["nameid"] ?>" 
					<?= $field["valid_empty"] == 1 ? "required" : "" ?>
					   type="text" 
					   name="<?= $field["nameid"] ?>" 
					   <?= $attr ?>
					   placeholder="<?= $placeholder ?>"
					   class=" <?= $css ?> <?= $field["valid_empty"] == 1 ? "required" : "" ?>">
			</div>
			<? endif ?>
			<? if($field['type_id'] == 'memo') : ?>
			<div class="row">
				<label><?= $field["name"] ?> <?= ($field["valid_empty"] == 1 ? "*" : "") ?></label>
				 <textarea 
					name="<?= $field["nameid"] ?>" 
					<?= $field["valid_empty"] == 1 ? "required" : "" ?> 
					placeholder="<?= $placeholder ?>"></textarea>			
			</div>
			<? endif ?>
		<? endforeach ?> 
		<div class="row ">
			<button type="submit" class="button">отправить</button>
		</div>
	</form>
</div>
	