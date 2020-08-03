<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
$(function(){
  const buildImg = (url)=> {
    const html = `
    <div class= "image">
    <img src="${url}" width="300px" height="300px">
    </div>
    `;
    return html;
  }
  $('.form-image').on('change',function(e) {
    // const element = $('.box-image__icon').children.length;
    // console.log(element);
    const file = e.target.files[0];
    const Url = window.URL.createObjectURL(file);
    if ($('.image')){
      $('.image').remove();
    }
    $('.image-select').append(buildImg(Url));
    
  //   if (element > 1) {
  //     $('.box-image__icon').children.remove();
  //     console.log('ok');
  // } 
})
});
</script>