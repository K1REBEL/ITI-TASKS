$(document).ready(function(){
   $('#slider>li:gt(0)').hide()
   var interval = setInterval(function() {
      $('#slider > li:first')
      .fadeOut(1000)
      .next()
      .fadeIn(1000)
      .end()
      .appendTo('#slider')
   }, 2000)

   $('#stop').click(function() {
   clearInterval(interval)
   })

   $('.box img').click(function() {
      var textBox = $(this).siblings('.textbox')
      textBox.slideToggle()
  })
})