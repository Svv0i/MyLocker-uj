
<footer style="max-height:150px ;" >
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <p class="logo" ><img height="60" src="images/111.svg"/></i> MY LOCKER</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <!-- <ul class="d-flex">                   
                        <li><a href="aboutus.php">about us</a></li>
                        <li><a href="contact.php">contact</a></li>
                    </ul> -->
                </div>

                <div class="col-lg-2 col-md-12 col-sm-12">
                    <p>&copy;2023_MYLOCKER</p>
                </div>

                <div class="col-lg-1 col-md-12 col-sm-12">
                    <!-- back to top  -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>
                </div>

            </div>

        </div>

    </footer>





    <script
  src="https://code.jquery.com/jquery-1.2.6.js"
  integrity="sha256-PMXBIUcTI7Jd5F/KtIYx1KCceOdq8hwQ10c1JoJgVYc="
  crossorigin="anonymous"></script>
        <script>
$(document).ready(function() {
  $('#build').change(function() {
    var selectedOption = $(this).val();
  
    $.ajax({
      url: 'get_options.php', // PHP script to retrieve options based on the selection
      type: 'POST',
      data: { selectedOption: selectedOption,select:1 },
      success: function(response) {
        $('#floor').html(response); //response have the result from get_option.php
        $('#Drawer').html("<optoin value=''>No options</option>"); 
      }
    });
  });
});
$(document).ready(function() {
 // تشغيل الداله بعد اكتمال تحميل الصفحة
  $('#floor').change(function() {
    var selectedOption = $(this).val();
    $.ajax({
      url: 'get_options.php', // PHP script to retrieve options based on the selection
      type: 'POST',
      data: { selectedOption: selectedOption,select:2  },
      success: function(response) {
        $('#Drawer').html(response);
      }
    });
  });
});

    </script>
</body>

</html>