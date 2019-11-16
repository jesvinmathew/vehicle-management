
<script src="<?= JS_PATH; ?>vendor/jquery.js"></script>
<script src="<?= JS_PATH; ?>vendor/modernizr.js"></script>
<script src="<?= JS_PATH; ?>foundation/foundation.js"></script>
<script src="<?= JS_PATH; ?>foundation/foundation.topbar.js"></script>
<!-- <script src="<?= JS_PATH; ?>vendor/angular.min.js"></script> -->
<script src="js/foundation/foundation.orbit.js"></script>
<script>
    $(document).foundation('orbit', 'reflow');
    $(document).foundation({
  orbit: {
    animation: 'slide',
    timer_speed: 1000,
    pause_on_hover: true,
    animation_speed: 500,
    navigation_arrows: true,
    bullets: false
  }
});

</script>