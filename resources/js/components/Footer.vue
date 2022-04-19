<template>

  <footer class="mt-5 fixed-bottom bg">

    <div>
      <div class="spacer"></div>

      <div class="social">
        <span class="icon" style="padding:0 10px 0 10px;"><a href="https://www.facebook.com/"><img class="img_size" alt="Facebook" src="https://cdn-icons-png.flaticon.com/512/59/59439.png" title="Facebook"></a></span>
        <span class="icon" style="padding:0 10px 0 10px;"><a href="https://twitter.com/"><img class="img_size" alt="Twitter" src="https://cdn-icons-png.flaticon.com/512/1384/1384033.png" title="Twitter"></a></span>
        <span class="icon" style="padding:0 10px 0 10px;"><a href="https://instagram.com/"><img class="img_size" alt="Instagram" src="https://cdn1.iconfinder.com/data/icons/ios-11-glyphs/30/instagram-512.png" title="Instagram"></a></span>
      </div>

      <div class="text">
        <div class="text-content" style="line-height: 150%; font-size: 12px; color: #fff; font-family: inherit;">
        <p style="font-size: 14px; line-height: 21px; text-align: center; letter-spacing: 2px;"><span style="font-size: 14px; line-height: 21px;">www.boolpress.com</span></p>
      </div>

      <div class="center" style="border-top:1px solid #C9C9C9;width:90%;"></div>

      <div class="col-12">
        <div class="text">
          <div class="text-content" style="line-height: 150%; font-size: 12px; font-family: inherit; color: #afafaf;">
            <p style="font-size: 10px; line-height: 15px; text-align: center;"><span style="font-size: 10px; line-height: 15px;">If you have questions regarding your data, please visit our <a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #0073aa;" target="_blank">Privacy Policy</a> </span></p>
            <p style="font-size: 10px; line-height: 15px; text-align: center;"><span style="font-size: 10px; line-height: 15px;"><span style="line-height: 18px;"><span style="line-height: 18px;">Want to change how you receive these emails? You can <a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #0073aa;" target="_blank">update your preferences</a> or <a href="http://www.example.com" rel="noopener" style="text-decoration: underline; color: #0073aa;" target="_blank">unsubscribe</a> from this list.&nbsp;</span></span><span style="line-height: 18px;">© 2022 Company. All Rights Reserved.</span></span></p>
          </div>
        </div>
      </div>

      </div>
    </div>

  </footer>


  
</template>

<script>
export default {
    name: 'Footer'
}
</script>

<style>

  footer {
    margin: 0 auto;
  }

  .spacer {
    height: 20px;
  }

  .social {
    padding: 10px;
    text-align: center;
  }
  .img_size {
    height: 20px;
    filter: invert(100%);
  }

  .text {
    padding: 10px 0px 10px 0px;
  }

  .center {
    padding: 10px;
    border-top: 1px solid #C9C9C9;
    width: 90%;
    margin: auto;
  }

  .bg {
    background-color: #343a40;
  }
</style>