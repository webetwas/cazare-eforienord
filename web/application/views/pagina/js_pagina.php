<?php if($page->i): ?>

<script type="text/javascript">

$(document).ready(function() {
    $("a[rel=example_group]").fancybox({
        'transitionIn'      : 'none',
        'transitionOut'     : 'none',
        'titlePosition'     : 'over',
        'titleFormat'       : function(title, currentArray, currentIndex, currentOpts) {
            return '<span id="fancybox-title-over">Imagine ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
        }
    });

});
<!--fancybox-->
</script>
<?php endif; ?>