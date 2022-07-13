function check(fvalue, fld, funct, actype) {
    $.post("index.php?module=voucher&func=check&field=" + fld + "&fvalue=" + fvalue + "&actype=" + actype, function (msg) {
        if (msg == 0) {
            window.location.href = "index.php?module=voucher&func=" + funct;
            return false;
        } else {
            jConfirm('Do u want To Edit?', 'Confirmation Dialog', function (r) {
                if (r == true) {
                    window.location.href = "index.php?module=voucher&func=" + funct + "&id=" + msg;
                } else {
                    window.location.href = "index.php?module=voucher&func=" + funct;
                }
            });
        }
    });
}

$(document).ready(function () {
    callauto("debit", "index.php?module=voucher&func=getparty&ce=0", ["id_head_debit"],["Account Name", "Address", "Group"]);
    callauto("credit", "index.php?module=voucher&func=getparty&ce=0", ["id_head_credit"],["Account Name", "Address", "Group"]);
    $("#amt").priceField();
    $("#save").click(function () {
        if (form_valid()) {
            $("#save").attr("disabled", "disabled");
            $("form").submit();
        }
    });
    $("#no").focus();
    $("#no").blur(function () {
	if ($("#hide").val()=="") {
        $.post("index.php?module=voucher&func=check", {no: $("#no").val()}, function (data) {
            if (data >= 1) {
                $("#msgbox").fadeTo(900, 0.1, function () {
                    $(this).html('Voucher no. already in use...').removeClass().addClass('msgerror').fadeTo(900, 1);
                    setTimeout(function () { $("#no").focus(); }, 1);
                })
            } else {
                $("#msgbox").hide('slow')
            }
        })
	}
    })
})
var fvalid;
function form_valid() {
    var fvalid = $("#add_voucher").validate({
        rules: {
            'vno': {required: true},
            'debit': {required: true},
            'credit': {required: true},
            'voucher[id_head_credit]': {required: true},
            'voucher[id_head_debit]': {required: true},
            'voucher[total]': {required: true, min: 0.01, number: true}
        },
        messages: {
            'vno': {required: "<br/>This Field is Required"},
            'debit': {required: "<br/>This Field is Required"},
            'credit': {required: "<br/>This Field is Required"},
            'voucher[id_head_credit]': {required: "<br/>This Field is Required"},
            'voucher[id_head_debit]': {required: "<br/>This Field is Required"},
            'voucher[total]': {required: "<br/>This Field is Required"}
        }
    });
    var x = fvalid.form();
    return x;
}
function getsalebills() {
    var id_head = $("#id_head_credit").val();
    var url = "index.php?module=voucher&func=billdetail&ce=0&id=" + id_head;
    $.getJSON(url, function (data) {
        htm = "<tr><th>Bill No</th><th>Date</th><th>Representative</th><th>Company</th><th>Total Amount</th><th>Pending</th><th>ID</th></tr>";
        $.each(data, function (i, item) {
            part3 = parseInt(parseInt(i) + 1);
            htm += '<tr>';
            htm += '<td><a class="clickable" href="#" id="' + item.id_sale + '" onclick="assignval(\'' + item.invno + '\', ' + item.pending + ',' + item.id_sale + ')" >' + item.invno + '</a></td>';
            htm += '<td>' + convertDate(item.date) + '</td><td>' + item.salesman + '</td><td>' + item.cname + '</td><td align="right">' + item.total + '</td><td align="right">' + item.pending + '</td><td align="right">' + item.id_sale + '</td>';
            htm += '</tr>';
        });
        $("#billdetail").html(htm);
    })
}
function assignval(billno, amt, id) {
    var actamt = $("#amt").val();
    actamt = parseFloat(actamt).toFixed(2);
    if (actamt == 0.00) {
        alert("Please enter Amount");
        $("#amt").focus();
    } else {
        var actamt = $("#billamt tr:last-child td:last-child input").val();
        var lastent = $("#billamt tr:last-child td:first-child").html();
        if (lastent=="&nbsp;") {
            $("#" + id).attr('onclick','').unbind('click').removeClass('clickable');
            $("#billamt tr:last-child td:first-child").html('<input type="text" name="billno[]" value="' + billno + '">'+'<input type="hidden" name="billid[]" value="' + id + '">');
            if (actamt > amt) {
                newamt = parseFloat(parseFloat(actamt) - parseFloat(amt)).toFixed(2);
                $("#billamt tr:last-child td:last-child input").val(amt);
                $("#billamt tr:last").after('<tr><td>&nbsp;</td><td><input type="text" name="bamt[]" value="' + newamt + '"></td></tr>')
            } else {
                $("#billamt tr:last-child td:last-child input").val(actamt);
            }
        } else {
            alert('All Payments adjusted.');
        }
    }
}
function convertDate(inputFormat) {
    function pad(s) {
        return (s < 10) ? '0' + s : s;
    }
    var d = new Date(inputFormat);
    return [pad(d.getDate()), pad(d.getMonth() + 1), d.getFullYear()].join('/');
}
