<!--Jquery js-->
<script src="<?php echo base_url("assets/"); ?>js/jquery-3.0.0.min.js"></script>
<!--Popper js-->
<script src="<?php echo base_url("assets/"); ?>js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="<?php echo base_url("assets/"); ?>js/bootstrap.min.js"></script>
<!--Bootstrap Datepicker js-->
<script src="<?php echo base_url("assets/"); ?>js/bootstrap-datepicker.min.js"></script>
<!--Perfect Scrollbar js-->
<script src="<?php echo base_url("assets/"); ?>js/jquery-perfect-scrollbar.min.js"></script>
<!--Owl-Carousel js-->
<script src="<?php echo base_url("assets/"); ?>js/owl.carousel.min.js"></script>
<!--SlickNav js-->
<script src="<?php echo base_url("assets/"); ?>js/jquery.slicknav.min.js"></script>
<!--Magnific js-->
<script src="<?php echo base_url("assets/"); ?>js/jquery.magnific-popup.min.js"></script>
<!--Select2 js-->
<script src="<?php echo base_url("assets/"); ?>js/select2.min.js"></script>
<!--jquery-ui js-->
<script src="<?php echo base_url("assets/"); ?>js/jquery-ui.min.js"></script>
<!--Main js-->
<script src="<?php echo base_url("assets/"); ?>js/main.js"></script>
<script>
    $.getJSON("<?php echo base_url(); ?>il-bolge.json", function(sonuc){
        $.each(sonuc, function(index, value){
            var row="";
            row +='<option value="'+value.il+'">'+value.il+'</option>';
            $("#il").append(row);
        })
    });
    $("#il").on("change", function(){
        var il=$(this).val();
        $("#ilce").attr("disabled", false).html("<option value=''>Seçin..</option>");
        $.getJSON("<?php echo base_url(); ?>il-ilce.json", function(sonuc){
            $.each(sonuc, function(index, value){
                var row="";
                if(value.il==il)
                {
                    row +='<option value="'+value.ilce+'">'+value.ilce+'</option>';
                    $("#ilce").append(row);
                }
            });
        });
    });
</script>
<script>
    <?php $url1 = $this->uri->segment(1); $url2 = $this->uri->segment(2); ?>
    function multiple_values(inputclass){
        var val = new Array();
        $("."+inputclass+":checked").each(function() {
            val.push($(this).val());
        });
        return val;
    }
    var speed,brand,akn;
    $(document).ready(function(){
        $('.item_filter').click(function(){
             brand  = multiple_values('brand');
             akn  = multiple_values('akn');
             speed  = multiple_values('speed');
            $.ajax({
                url: "<?php echo base_url();echo $url1; ?>/<?php echo $url2; ?>",
                type:'post',
                data:{brand:brand,speed:speed,akn:akn},
                success:function(response){
                    $('.body').html(response);
                }
            });
        });
        
    });    
</script>