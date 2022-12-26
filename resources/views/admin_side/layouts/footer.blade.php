    </div>
</div>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('admin_assets/lib/chart/chart.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/tempusdominus/js/moment.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/tempusdominus/js/moment-timezone.min.js')}}"></script>
<script src="{{asset('admin_assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('admin_assets/js/main.js')}}"></script>
<script>
    $(document).ready(function () {
       var max_fields = 10;
       var wrapper_1 = $(".addSkill");
       var add_button_1 = $(".add_form_field_1");

       var y = 1;
       $(add_button_1).click(function (e) {
           e.preventDefault();
           if (y < max_fields) {
               y++;
               $(wrapper_1).append(
                   '<div><input type="text" placeholder="Skill" class="form-control" name="myskill[]" required/><a href="#" class="delete">Delete</a></div>'
                   ); //add input box
           } else {
               alert('You Reached the limits')
           }
       });

       $(wrapper_1).on("click", ".delete", function (e) {
           e.preventDefault();
           $(this).parent('div').remove();
           y--;
       })
   });
</script>
</body>

</html>
