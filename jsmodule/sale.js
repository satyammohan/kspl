var start = 1;
var rowcontent = "";
function getbatch(id) {
    var parts = id.match(/(\D+)(\d+)$/);
    itemid = $("#id_product__" + parts[2]).val();
    if (itemid != "") {
        var dealer = $("#dealer").val();
        if ($("#sale_id").val() == '') {
            callauto("batch_no__" + parts[2], "index.php?module=sales&func=getbatch&showall=0&ce=0&id=" + itemid + "&dealer=" + dealer, ["id_batch__" + parts[2], "exp_date__" + parts[2], "rate__" + parts[2]], ['Batch No', 'Exp Date', 'Rate', 'Mfg Date', 'Stk Avl']);
        } else {
            callauto("batch_no__" + parts[2], "index.php?module=sales&func=getbatch&showall=1&ce=0&id=" + itemid + "&dealer=" + dealer, ["id_batch__" + parts[2], "exp_date__" + parts[2], "rate__" + parts[2]], ['Batch No', 'Exp Date', 'Rate', 'Mfg Date', 'Stk Avl']);
        }
    } else {
        $("#totalamt").focus();
    }
}
function addRow(tableID) {
    start = start + 1;
    rowcontent.find("input,select,a").attr("id", function () {
        var parts = this.id.split('__');
        return parts ? parts[0] + "__" + start : null;
    });
    $("#" + tableID + " tr:last").after("<tr>" + rowcontent.html() + "</tr>");
    product_dropdown();
    $("#item__" + start).focus();
}
function removeRow(obj) {
    if ($(obj).parents("tr").siblings("tr.tabRow").length > 0) {
        $(obj).closest("tr").remove();
    } else {
        alert("You can not remove this row.");
    }
    getValues();
}
function rowadd(obj, tid) {
    if ($(obj).closest('tr').is(':last-child')) {
        addRow(tid)
    }
}
function findvalue(o_name, idx) {
    var obj1 = $("input[name='" + o_name + "[]']");
    var ret = obj1[idx].value
    return ret;
}
function selectboxval(o_name, idx) {
    var obj2 = $("select[name='" + o_name + "[]']");
    var ret2 = obj2[idx].value;
    return ret2;
}
function find_discount(d1, d1_type, amt, qty) {
    if (d1_type == 0) {
        disc_amt = eval((d1 / 100) * amt);
    } else if (d1_type == 1) {
        disc_amt = eval(d1 * qty);
    } else {
        disc_amt = d1;
    }
    return parseFloat(disc_amt).toFixed(2);
}
function getValues() {
    var totaldisc = 0, totalamt = 0, vat = 0, res = 0.00, cessamt = 0, billcase = 0, billqty = 0;
    var obj = $("input[name='amount[]']");
    var caseext = $("input[name='case[]']").length;
    for (var i = 0; i < obj.length; i++) {
        var qty = parseFloat(findvalue("quantity", i) * 1);
        //		if (qty!=0) {
        billqty = billqty + qty;
        var mycase = parseFloat(caseext > 0 ? findvalue("case", i) : 0);
        billcase = billcase + mycase;

        var rate = findvalue("rate", i);
        var d1 = findvalue("discount1", i);
        var d2 = findvalue("discount2", i);
        var d3 = findvalue("discount3", i);
        var cess = findvalue("cess", i);
        var tax = findvalue("tax_per", i);
        var bal = findvalue("balance", i);
        var d1_type = selectboxval("discount_type1", i);
        var d2_type = selectboxval("discount_type2", i);
        var d3_type = selectboxval("discount_type3", i);
        var amt = obj[i].value = parseFloat((qty * rate)).toFixed(2);
        totalamt = parseFloat(totalamt) + parseFloat(amt);

        disc1_amt = find_discount(d1, d1_type, amt, qty);
        amt = amt - disc1_amt;
        disc2_amt = find_discount(d2, d2_type, amt, qty);
        amt = amt - disc2_amt;
        disc3_amt = find_discount(d3, d3_type, amt, qty);
        amt = parseFloat(amt) - parseFloat(disc3_amt);

        var goods_amount = $("input[name='goods_amount[]']");
        goods_amount[i].value = amt.toFixed(2);

        vatamt = parseFloat(amt * tax / 100).toFixed(2);
        itemcess = parseFloat(amt * cess / 100).toFixed(2);

        vat = parseFloat(vat) + parseFloat(vatamt);
        cessamt = parseFloat(cessamt) + parseFloat(itemcess);
        amt = parseFloat(amt) + parseFloat(vatamt) + parseFloat(itemcess);
        totaldisc = parseFloat(totaldisc) + parseFloat(disc1_amt) + parseFloat(disc2_amt) + parseFloat(disc3_amt);

        var taxfld = $("input[name='tax_amount[]']");
        taxfld[i].value = vatamt;
        var cessfld = $("input[name='cessamt[]']");
        cessfld[i].value = itemcess;
        var d1_amt = $("input[name='discount_amount1[]']");
        d1_amt[i].value = disc1_amt;
        var d2_amt = $("input[name='discount_amount2[]']");
        d2_amt[i].value = disc2_amt;
        var d3_amt = $("input[name='discount_amount3[]']");
        d3_amt[i].value = disc3_amt;
        if (parseFloat(bal) <= 0) {
            $("#qty__" + [i + 1]).addClass('err');
        } else {
            $("#qty__" + [i + 1]).removeClass('err');
        }
        //		}
    }
    document.getElementById("totalamt").value = parseFloat(totalamt).toFixed(2);
    document.getElementById("tdiscount").value = parseFloat(totaldisc).toFixed(2);
    document.getElementById("vat").value = vat.toFixed(2);
    document.getElementById("totalcess").value = cessamt.toFixed(2);
    bill_ro = parseFloat(document.getElementById("roundof").value ? document.getElementById("roundof").value : 0.00);
    packing = parseFloat(document.getElementById("pfrd").value ? document.getElementById("pfrd").value : 0.00);
    bill_less = parseFloat(document.getElementById("less").value ? document.getElementById("less").value : 0.00);
    res = parseFloat((parseFloat(totalamt) + parseFloat(vat) - parseFloat(totaldisc) + parseFloat(packing) + parseFloat(cessamt)) - parseFloat(bill_less) + parseFloat(bill_ro));
    var tcs_per = document.getElementById("tcsper").value;
    if (tcs_per > 0) {
        var bill_tcs = parseFloat(res * tcs_per / 100).toFixed(2);
    } else {
        var bill_tcs = 0;
    }
    $("#tcsamt").val(bill_tcs);
    res = parseFloat((parseFloat(totalamt) + parseFloat(vat) - parseFloat(totaldisc) + parseFloat(packing) + parseFloat(cessamt)) - parseFloat(bill_less) + parseFloat(bill_ro) + parseFloat(bill_tcs));
    document.getElementById("total").value = res.toFixed(2);
    $("#billtotcase").html(billcase);
    $("#billtotqty").html(billqty);
}
function findtcs() {
    var id_head = $("#id_head").val();
    var date = $("#date").val();
    $.post("index.php?module=sales&func=gettcs", { id_head: id_head, date: date }, function (res) {
        tilltodaysales = JSON.parse((res));
        _ptotal = parseFloat($("#prev_total").val() ? $("#prev_total").val() : 0);
        _ctotal = parseFloat($("#total").val() ? $("#total").val() : 0);
        var _st = (parseFloat(tilltodaysales[0]['total']) - _ptotal + _ctotal).toFixed(2);
        _sdt = new Date(tilltodaysales[0]['date']);
        _edt = new Date("2020/10/01");
        if (_st < 5000000 || _sdt < _edt) {
            tilltodaysales[0]['tcsper'] = 0;
            $("#sales_till_now").html("Sales till " + date + " is : " + _st);
            var tcs_per = 0;
        } else {
            $("#sales_till_now").html("Sales till " + date + " is : " + _st + ". Please charge TCS on this bill.");
            var tcs_per = tilltodaysales[0]['tcsper'];
        }
        $("#tcsper").val(tcs_per);
        getValues();
        $("#sub").removeAttr("disabled");
        $("#print").removeAttr("disabled");
    })
}

function roundbill() {
    document.getElementById("roundof").value = 0.00;
    getValues();
    var alltot = document.getElementById("total").value;
    var bill_ro = eval(Math.round(alltot) - alltot).toFixed(2);
    document.getElementById("roundof").value = parseFloat(bill_ro).toFixed(2);
    document.getElementById("total").value = Math.round(alltot).toFixed(2);
}
function getdiscount() {
    var _1 = $("input[name='items[]']");
    for (var i = 0; i < _1.length; i++) {
        var _3 = $("input[name='id_product[]']");
        var id = _3[i].value;
    }
    $.post("index.php?module=sales&func=getdiscount", {
        id_head: $("#id_head").val(),
        id_product: id
    }, function (_5) {
        $("#dis1__" + [i]).val(_5);
    });
}
function product_dropdown() {
    var id = $("#id_company").val();
    var dealer = $("#dealer").val();
    //callauto("item__" + start, "index.php?module=sales&func=getcomp&ce=0&id="+id+"&dealer="+dealer, ["id_product__" + start, "rate__" + start, "tax_per__" + start, "id_taxmaster__" + start, "cess__" + start, "balance__" + start, "itemcase__" + start]);
    callauto("item__" + start, "index.php?module=sales&func=getcomp&ce=0&id=" + id + "&dealer=" + dealer, ["id_product__" + start, "rate__" + start, "tax_per__" + start, "id_taxmaster__" + start, "cess__" + start, "balance__" + start, "itemcase__" + start], ["Item Name", "Rate", "GST %", "Stk Avl", "Company"]);
}
function getQuantity(id) {
    var parts = id.match(/(\D+)(\d+)$/);
    var nocase = $("#" + id).val();
    var itemcase = $("#itemcase__" + parts[2]).val();
    if (nocase != 0 && itemcase != 0)
        $("#qty__" + parts[2]).val(itemcase * nocase);
}
function checkpartybalance() {
    var id_head = $("#id_head").val();
    if (id_head == "") {
        $('input:radio[name="sales[cash]"][value="2"]').prop('checked', true);
    }
    var billamt = $("#total").val();
    $.post("index.php?module=sales&func=checkbalance", { id_head: id_head, billamt: billamt }, function (res) {
        os = JSON.parse((res));
        console.log(os);
        $("#message").html(os['message']);
        if (os['net'] > os['balance'] && os['balance'] > 0) {
            //alert("Outstanding is more than Credit allowed. Billing Stopped.");
            $("#sub").attr("disabled", "disabled");;
            $("#print").attr("disabled", "disabled");
            $("#party_message").html("Credit Balance : " + os['balance'] + ". Current Balance is " + os['net'] + "<br>Outstanding is more than Credit allowed. Billing Stopped.");
        } else {
            if (os['days'] > os['allow'] && os['balance'] > 0) {
                //alert("Outstanding days is more than allowed days. Billing Stopped.");
                $("#sub").attr("disabled", "disabled");;
                $("#print").attr("disabled", "disabled");
                $("#party_message").html("Credit Balance : " + os['balance'] + ". Current Balance is " + os['net'] + " days :" + os['days'] + "<br>Outstanding days is more than allowed days. Billing Stopped.");
            } else {
                $("#sub").removeAttr('disabled');
                $("#print").removeAttr('disabled')
                $("#party_message").html("Credit Balance : " + os['balance'] + ". Current Balance is " + os['net']);
            }
        }
    });
    return false;
}
function getseriescompany() {
    if ($("#sale_id").val() == '' && $("#id_company").val() == '') {
        myseries = $("#series :selected").text();
        $.post("index.php?module=sales&func=getprefixcompany", { series: myseries }, function (data) {
            //$("#id_company").val(data);
            $('#id_company option[value=' + data + ']').attr('selected', 'selected');
        })
    }
}
$(document).ready(function () {
    $("#sub").click(function () {
        $("#sub").unbind('click');
        act = ($("#sale_id").val() == '') ? "insert" : "update";
        document.sales.action = 'index.php?module=sales&func=' + act;
        //$("form").submit();
        if ($("#sale_id").val() == '') {
            myseries = $("#series :selected").text();
            $.post("index.php?module=sales&func=checkbillno", { series: myseries, taxbill: $("#taxtype").val(), invno: $("#inv").val() }, function (data) {
                //$.post("index.php?module=sales&func=getsuffix", {series: myseries, taxbill: $("#taxtype").val()}, function(data) {
                if (data)
                    $("#inv").val(data);
                $("form").submit();
            })
        } else {
            $("form").submit();
        }
    });
    $("#print").click(function () {
        $("#print").unbind('click');
        act = ($("#sale_id").val() == '') ? "insert" : "update&id=";
        frmaction = 'index.php?module=sales&ce=0&func=' + act;
        $.ajax({
            url: frmaction,
            type: 'POST',
            data: $('#sales').serialize(),
            success: function (res) {
                window.open("index.php?module=sales&func=prsale&id=" + res + "", "_new", 'scrollbars=yes,resizable=yes,width=600,height=450,top=50,left=250');
                location.reload();
            }
        });
    });
    $(window).keypress(function (event) {
        if (!(event.which == 115 && event.ctrlKey) && !(event.which == 19))
            return true;
        event.preventDefault();
        $("#sub").trigger("click");
        return false;
    });
    rowcontent = $("#mtable tr:first").clone(true);
    $("#id_head").change(function () {
        product_dropdown();
        $("#id_area").focus();
    })
    $("#id_company").change(function () {
        product_dropdown();
    })
    product_dropdown();
    callauto("party", "index.php?module=sales&func=getparty&ce=0", ["id_head", "paddr", "paddr2", "id_area", "vattype", "vatno", "id_transport", "dealer"], ["Party Name", "Address", "Address1", "GSTIN"]);
    $('input[type=text]').on("keydown", function (e) {
        var next_idx = $('input[type=text]').index(this) + 1;
        var tot_idx = $('body').find('input[type=text]').length;
        if (e.keyCode == 13) {
            if (tot_idx == next_idx)
                $('input[type=text]:eq(0)').focus();
            else
                $('input[type=text]:eq(' + next_idx + ')').focus();
        }
    });
    $("#series").blur(function () {
        myseries = $("#series :selected").text();
        $.post("index.php?module=sales&func=getsuffix", { series: myseries, taxbill: $("#taxtype").val() }, function (data) {
            $("#inv").val(data);
        })
        getseriescompany();
    })
    $("#inv").blur(function () {
        $.post("index.php?module=sales&func=check", { invno: $("#inv").val() }, function (data) {
            if (data >= 1) {
                $("#msgbox").fadeTo(900, 0.1, function () {
                    $(this).html('This Invoice no. already in use...').removeClass().addClass('msgerror').fadeTo(900, 1);
                    setTimeout(function () {
                        $("#inv").focus();
                    }, 1);
                })
            } else {
                $("#msgbox").hide('slow')
            }
        })
    })
    $("#party").blur(function () {
        var y = $("input[name='sales[paymod]']:checked").val();
        var x = $(this).val();
        if ((y == 2) && (x == '')) {
            $("#valid_party").html("Plz Fill out this field").addClass('msgerror');
        } else {
            $("#valid_party").hide();
        }
        product_dropdown();
        $("#id_area").focus();
    })
    setTimeout(function () { $("#series").focus() }, 500);
});
function getTaxRates(id) {
    curid = $("#" + id).val();
    var parts = id.match(/(\D+)(\d+)$/);
    $("#tax_per__" + parts[2]).val(taxrates[curid]);
}
function doInputs(obj, id) {
    if (obj.checked) {
        document.getElementById(id).style.display = 'block'
    } else {
        document.getElementById(id).style.display = 'none'
    }
}