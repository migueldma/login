$(function(){
    var ajax_url = base_url+'third_party/crud/'
    //var ajax_url = 'http://apuestas.local/crud/';
    //var ajax_url = 'http://apuestas.margin0auto.com/crud/';
    var tableBody = $('#jugadas').find('table tbody');
    var currentRows = $('#jugadas').data('rows');
    $(".loteria").change(function(){
        selectItem($(this));
    });
    $("#createTicket").click(function() {
       createNewTicket();
    });
    $("#search_ticket").submit(function(e) {
        e.preventDefault();
        readTicket($(this).find("#search_ticket_hash").val());
    });
    $(document).on('keydown', function(e) {
        if (tableBody.find('input').is(":focus")) {
            var keyCode = e.keyCode || e.which;
            if(keyCode == 13 || keyCode == 9) {
                e.preventDefault();
                var next_item = $('#'+$(':focus').data('next-item'));
                next_item.addClass('show');
                next_item.focus();
            }
        }
    });
    $('.newRow').click(function() {
        addNewTableRow();
    });
    function selectItem(item) {
        //console.log('Lottery selected, next item: ' + item.data('next-item'));
        var next_item = $('#'+item.data('next-item'));
        next_item.addClass('show');
        next_item.focus();
        if ($('#lotteryTip').length > 0) {
            $('#lotteryTip').remove();
        }
    }
    function addNewTableRow() {
        var rowNum = (currentRows + 1);
        $.ajax({
            url: base_url+'application/views/principal/new-table-row.php',
            type: 'GET',
            data: {
                currentRow : rowNum
            },
            success: function(tableRow) {
                tableBody.find('.newRow').remove();
                tableBody.append(tableRow);
                currentRows = currentRows + 1;
                $('#jugadas').attr('data-rows', currentRows);
                tableBody.find('.loteria').bind('change', function() {
                    selectItem($(this));
                });
                tableBody.find('.newRow').bind('click', function() {
                    addNewTableRow();
                });
            },
            error: function() {
                console.log('Error!!');
            }
        });
    }

    function createNewTicket() {
        var jugadas = [];
        $("#jugadas tbody tr").each(function(i, v){
            jugadas[i] = $(".playField", $(this)).map(function() {
                return $(this).val();
            }).get();
        });
        $.ajax({
            url: ajax_url + 'create_ticket.php',
            type: 'POST',
            data: {
                jugadas: jugadas
            },
            success: function(ticket_detalle) {
                console.log(ticket_detalle);
                var detalles = "";
                ticket_detalle = $.parseJSON(ticket_detalle);
                $.each(ticket_detalle, function(key, val) {
                    detalles += "<p>"+val+"</p>";
                });
                $("#detalle-ticket").html(detalles);
            },
            error: function() {
                console.log('Error!!');
            }
        });
    }
    function readTicket(ticket_hash) {
        $("#search_ticket_result").removeClass('show');
        $.ajax({
            url: ajax_url + 'read_ticket.php',
            type: 'POST',
            data: {
                ticket_hash: ticket_hash
            },
            success: function(ticket) {
                if (ticket.length > 0) {
                    var row_html;
                    $('#search_ticket_result tbody').html("");
                    ticket = $.parseJSON(ticket);
                    $.each(ticket, function (ticket_key, ticket_info) {
                        row_html = "";
                        row_html += "<tr>";
                        $.each(ticket_info, function (key, val) {
                            row_html += "<td>" + val + "</td>";
                        });
                        row_html += "</tr>";
                        $("#search_ticket_result tbody").append(row_html);
                    });
                    $("#search_ticket_result").addClass('show');
                }
            },
            error: function() {
                console.log('Error!!');
            }
        });
    }
});