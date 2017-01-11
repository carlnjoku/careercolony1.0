<script src="../assets/components/library/jquery/jquery.min.js?v=v2.1.0"></script>
<script src="<?php echo base_url(); ?>plugins/sticky-element.js"></script>   
<style>
* {
    font-size: 10px;
    color: #333;
    box-sizing: border-box;
}
.wrapper, .header, .main, .footer {
    padding: 10px;
    position: relative;
}
.wrapper {
    border: 1px solid #333;
    background-color: #f5f5f5;
    padding: 10px;
}
.header {
    background-color: #6289AE;
    margin-bottom: 10px;
    height: 100px;
}
.sidebar {
    position: absolute;
    padding: 10px;
    background-color: #ccc;
    height: 300px;
    width: 100px;
    float: left;
}
.main {
    background-color: #ccc;
    height: 600px;
    margin-left: 110px;
}
.footer {
    background-color: #6289AE;
    margin-top: 10px;
    height: 250px;
}
.top {
    position: absolute;
    top: 10px;
}
.bottom {
    position: absolute;
    bottom: 10px;
}
.clear {
    clear: both;
    float: none;
}

</style>

<script>
 
$(".sidebar").stick_in_parent({
    offset_top: 30
});

</script>

<div class="wrapper">
    <div class="header"> <a class="top">header top</a>
 <a class="bottom">header bottom</a>

    </div>
    <div class="content">
        <div class="sidebar"> <a class="top">sidebar top</a>
 <a class="bottom">sidebar bottom</a>

        </div>
        <div class="main"> <a class="top">main top</a>
 <a class="bottom">main bottom</a>

        </div>
        <div class="clear"></div>
    </div>
    <div class="footer"> <a class="top">footer top</a>
 <a class="bottom">footer bottom</a>

    </div>
</div>

