<!-- Bootstrap Script -->

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="https://www.amcharts.com/lib/3/amcharts.js?x"></script>
<script src="https://www.amcharts.com/lib/3/serial.js?x"></script>
<script src="https://www.amcharts.com/lib/3/themes/dark.js"></script>

<!-- JavaScript -->
<script type="text/javascript">
    $(document).ready(function() {
        $('.print').click(function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "print.php",
                method: "post",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModall').modal("show");
                }
            });
        });
    });



    $(document).ready(function() {
        $('.printOrder').click(function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "printOrder.php",
                method: "post",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModall').modal("show");
                }
            });
        });
    });







    $(document).ready(function() {
        $('.view_data').click(function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "select.php",
                method: "post",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    });



    $(document).ready(function() {
        $('.view_order_data').click(function() {
            var employee_id = $(this).attr("id");
            $.ajax({
                url: "select_order.php",
                method: "post",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        });
    });



    $(document).on('click', '.delete_data', function() {
        var delete_id = $(this).attr("id");
        if (confirm("Are you sure want to remove this data?")) {
            $.ajax({
                url: "delete.php",
                method: "post",
                data: {
                    delete_id: delete_id
                },
                success: function(data) {
                    $('#deletedataModal').modal
                    location.reload(true);
                }
            });
        }
    });


    $(document).on('click', '.delete_order', function() {
        var delete_id = $(this).attr("id");
        if (confirm("Are you sure want to remove this data?")) {
            $.ajax({
                url: "delete_order.php",
                method: "post",
                data: {
                    delete_id: delete_id
                },
                success: function(data) {
                    $('#deletedataModal').modal
                    location.reload(true);
                }
            });
        }
    });



    $(document).on('click', '.edit_data', function() {
        var employee_id = $(this).attr("id");
        if (confirm("Are you sure want to remove edit this data?")) {
            $.ajax({
                url: "edit.php",
                method: "post",
                data: {
                    employee_id: employee_id
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModal').modal("show");
                }
            });
        }
    });







    $(document).ready(function() {
        $("#myModal").modal('show');
    });


    //DatePicker

    $(function() {
        $(".datepicker").datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            maxDate: "+10D",
        });
    });

    // Pagging

    $.fn.pageMe = function(opts) {
        var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pager');

        if (typeof settings.childSelector != "undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector != "undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.size();
        var numPages = Math.ceil(numItems / perPage);

        pager.data("curr", 0);

        if (settings.showPrevNext) {
            $('<li class="page-item"> <a class="page-link prev_link" href="#" tabindex="-1" aria - disabled="true"> Previous </a> </li>').appendTo(pager);
        }

        var curr = 0;
        while (numPages > curr && (settings.hidePageNumbers == false)) {
            $('<li class="page-item"><a class="page-link page_link" href="#">' + (curr + 1) + '</a></li>').appendTo(pager);
            curr++;
        }

        if (settings.showPrevNext) {
            $('<li class="page-item"> <a class="page-link next_link" href="#"> Next </a> </li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages <= 1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");
        children.hide();
        children.slice(0, perPage).show();
        pager.find('li .page_link').click(function() {
            var clickedPage = $(this).html().valueOf() - 1;
            goTo(clickedPage, perPage);
            return false;
        });
        pager.find('li .prev_link').click(function() {
            previous();
            return false;
        });
        pager.find('li .next_link').click(function() {
            next();
            return false;
        });

        function previous() {
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next() {
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page) {
            var startAt = page * perPage,
                endOn = startAt + perPage;
            children.css('display', 'none').slice(startAt, endOn).show();
            if (page >= 1) {
                pager.find('.prev_link').show();
            } else {
                pager.find('.prev_link').hide();
            }

            if (page < (numPages - 1)) {
                pager.find('.next_link').show();
            } else {
                pager.find('.next_link').hide();
            }
            pager.data("curr", page);
            pager.children().removeClass("active");
            pager.children().eq(page + 1).addClass("active");
        }
    };
    $(document).ready(function() {
        $('.myTable').pageMe({
            pagerSelector: '.myPager',
            showPrevNext: true,
            hidePageNumbers: false,
            perPage: 5
        });
    });





    $.fn.pageMe = function(opts) {
        var $this = this,
            defaults = {
                perPage: 7,
                showPrevNext: false,
                hidePageNumbers: false
            },
            settings = $.extend(defaults, opts);

        var listElement = $this;
        var perPage = settings.perPage;
        var children = listElement.children();
        var pager = $('.pager2');

        if (typeof settings.childSelector != "undefined") {
            children = listElement.find(settings.childSelector);
        }

        if (typeof settings.pagerSelector != "undefined") {
            pager = $(settings.pagerSelector);
        }

        var numItems = children.size();
        var numPages = Math.ceil(numItems / perPage);

        pager.data("curr", 0);

        if (settings.showPrevNext) {
            $('<li class="page-item"> <a class="page-link prev_link" href="#" tabindex="-1" aria - disabled="true"> Previous </a> </li>').appendTo(pager);
        }

        var curr = 0;
        while (numPages > curr && (settings.hidePageNumbers == false)) {
            $('<li class="page-item"><a class="page-link page_link" href="#">' + (curr + 1) + '</a></li>').appendTo(pager);
            curr++;
        }

        if (settings.showPrevNext) {
            $('<li class="page-item"> <a class="page-link next_link" href="#"> Next </a> </li>').appendTo(pager);
        }

        pager.find('.page_link:first').addClass('active');
        pager.find('.prev_link').hide();
        if (numPages <= 1) {
            pager.find('.next_link').hide();
        }
        pager.children().eq(1).addClass("active");
        children.hide();
        children.slice(0, perPage).show();
        pager.find('li .page_link').click(function() {
            var clickedPage = $(this).html().valueOf() - 1;
            goTo(clickedPage, perPage);
            return false;
        });
        pager.find('li .prev_link').click(function() {
            previous();
            return false;
        });
        pager.find('li .next_link').click(function() {
            next();
            return false;
        });

        function previous() {
            var goToPage = parseInt(pager.data("curr")) - 1;
            goTo(goToPage);
        }

        function next() {
            goToPage = parseInt(pager.data("curr")) + 1;
            goTo(goToPage);
        }

        function goTo(page) {
            var startAt = page * perPage,
                endOn = startAt + perPage;
            children.css('display', 'none').slice(startAt, endOn).show();
            if (page >= 1) {
                pager.find('.prev_link').show();
            } else {
                pager.find('.prev_link').hide();
            }

            if (page < (numPages - 1)) {
                pager.find('.next_link').show();
            } else {
                pager.find('.next_link').hide();
            }
            pager.data("curr", page);
            pager.children().removeClass("active");
            pager.children().eq(page + 1).addClass("active");
        }
    };
    $(document).ready(function() {
        $('.myTable2').pageMe({
            pagerSelector: '.myPager2',
            showPrevNext: true,
            hidePageNumbers: false,
            perPage: 5
        });
    });



    // Toggle Form

    $(".toggleForm").click(function() {
        $("#signInForm").toggle();
        $("#logInForm").toggle();
    });


    // $(document).ready(function() { 
    // $(".ml-auto .nav-item").bind("click", function(event) { 
    // event.preventDefault(); // var clickedItem=$(this); 
    // $(".ml-auto .nav-item").each(function() { 
    // $(this).removeClass("active"); 
    // }); 
    // clickedItem.addClass("active"); 
    // }); 
    // }); 
    // $('#diary').bind('input propertychange', function() { 
    // $.ajax({ 
    // method: "POST" ,
    // url: "updatedatabase.php" , 
    // data: { 
    // content: $("#diary").val() 
    // } 
    // }); 
    // }); 



    $(".error").delay(10000).fadeOut('slow');

    function openNav() {
        document.getElementById("myNav").style.width = "50%";
    }

    function closeNav() {
        document.getElementById("myNav").style.width = "0%";
    }
</script>

</body>

</html>