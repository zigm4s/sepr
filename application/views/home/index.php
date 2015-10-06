<div class="row firstPageOwl">
<div class="col-lg-12">

</div></div>

<script lang="text/javascript">
    $(document).ready(function(){
        $("#owl-Offers").owlCarousel({
            items : 5,
            lazyLoad : true,
            navigation : true,
            autoHeight: false
        });
        $("#owl-Newest").owlCarousel({
            items: 5,
            itemsDesktop : [1000,5], //5 items between 1000px and 901px
            itemsDesktopSmall : [900,3], // betweem 900px and 601px
            itemsTablet: [600,2], //2 items between 600 and 0
            lazyLoad : true,
            navigation : true
        });
    });
</script>