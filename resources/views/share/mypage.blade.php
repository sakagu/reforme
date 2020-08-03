<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
  $(function(){
    $('.post_box_post').each(function(){
        $(this).on('click',function(){
            var target = $(this).data('target');
            var modal = document.getElementById(target);
            $(modal).fadeIn();
            return false;
        });
    });
    
    $('.js-modal-close').on('click',function(){
        $('.js-modal').fadeOut();
        return false;
    }); 

    $('.tab-content>div').hide();
    $('.tab-content>div').first().slideDown();
    $('.tab-buttons span').click(function(){
      var thisclass=$(this).attr('class');
      $('#lamp').removeClass().addClass('#lamp').addClass(thisclass);
      $('.tab-content>div').each(function(){
        if($(this).hasClass(thisclass)){
          $(this).fadeIn(800);
        }
        else{
          $(this).hide();
        }
      });
    });
  });
    
</script>

<script>
  function delete_alert(e){
    if(!window.confirm('本当に削除しますか？')){
        window.alert('キャンセルされました'); 
        return false;
    }
    document.deleteform.submit();
    };
</script>
