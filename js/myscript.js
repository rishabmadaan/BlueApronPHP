$(document).ready(function () {
    $("form").validate();
    $("#resthome").validate();
});

//setInterval(Show_reviews,1000);
function User_reviews(restid) {
    //alert();
    var xmlhttp = new XMLHttpRequest();
    var review = document.getElementById("review").value;
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {

        }
    };
    xmlhttp.open("GET", "add_review.php?q=" + review + "&restid=" + restid, true);
    xmlhttp.send();
}

function Show_reviews() {
    //alert();
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var output = this.responseText;
            //alert(output);
            var split_output = output.split('!@#$');
            var evenarray = [];
            var oddarray = [];
            for (i = 0; i < parseInt(split_output.length); i++) {
                if (i % 2 == 0) {
                    evenarray.push([i]);
                }
                else {
                    oddarray.push([i]);
                }
            }
            alert(oddarray + '------------' + evenarray + '     ' + oddarray[2] + ' ' + split_output[evenarray[2]]);
            for (j = 0; j < oddarray.length; j++) {

                document.getElementById(oddarray[j]).innerHTML = split_output[evenarray[j]];
            }
        }
    };
    xmlhttp.open("GET", "reviews.php", true);
    xmlhttp.send();
}

var rating_value = 0;

function fill(obj) {
    var id = obj.id;
    var val = parseInt(id.substring(id.indexOf("_") + 1));
    var i;
    if (rating_value == 0) {
        i = 1;
    }
    else {
        i = rating_value + 1;
    }

    for (; i <= 5; i++) {
        if (i <= val) {
            $('#rating_' + i).removeClass("glyphicon-star-empty").addClass("glyphicon-star");

        }
        else {
            $('#rating_' + i).removeClass("glyphicon-star").addClass("glyphicon-star-empty");
        }
    }
}

function selected(obj, rid, user) {
    //alert(rid);
    var id = obj.id;
    var val = parseInt(id.substring(id.indexOf("_") + 1));
    rating_value = val;
    if (rating_value == 0) {
        //alert();
    }
    else {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                //alert(this.responseText);
            }
        };
        xhttp.open("GET", "insert_rating.php?q=" + rid + "&user=" + user + "&rate=" + rating_value, true);
        xhttp.send();
        //document.getElementById("rating_value").value = rating_value;
    }
}

function unfill(obj) {
    var i;
    if (rating_value == 0) {
        i = 1;
    }
    else {
        i = rating_value + 1;
    }
    for (; i <= 5; i++) {

        document.getElementById("rating_" + i).src = "rating/empty_star.png";
    }
}

function addtocart(menuid) {
    //alert();
    var qty = $("#menu-" + menuid).val();
    if (qty == '') {
        alert("Please Choose the Quantity");
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            var output = this.responseText;
            //alert(output);
            var output_split = output.split('!@#$');
            document.getElementById("totalitems").innerHTML = output_split[0];
            document.getElementById("items").innerHTML = output_split[1];
            //location.reload();
        };
        xmlhttp.open("GET", "addtocart.php?q=" + menuid + "&qty=" + qty, true);
        xmlhttp.send();
    }
}

function updateqty(obj, menuid) {
    //alert();
    var qty = obj.value;
    //alert(qty);
    if (qty == '') {
        alert("Please Choose the Quantity");
    }
    else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            var output = this.responseText;
            //alert(output);
            var outputsplit = output.split('!@#$');
            document.getElementById("qtyitem-" + menuid).value = outputsplit[0];
            // alert();
            document.getElementById("subtotal-" + menuid).innerHTML = "&#8377;" + outputsplit[1];
            document.getElementById("grandtotal").innerHTML = "&#8377;" + outputsplit[2];
            document.getElementById("cgst").innerHTML = "&#8377;" + outputsplit[3];
            document.getElementById("sgst").innerHTML = "&#8377;" + outputsplit[3];
            document.getElementById("total").innerHTML = "&#8377;" + outputsplit[4];
            //alert();
        };
        xmlhttp.open("GET", "editqty.php?q=" + menuid + "&qty=" + qty, true);
        xmlhttp.send();
    }
}

function paynow(user, amount) {
    var modeofpayment = $("input[name='mode']:checked").val();
    var address=document.getElementById("address").value;
    if (user == '') {
        window.location.href = "userlogin.php";
    }
    else if (address=='')
    {
        alert("Please Enter the Address");
    }
    else {
        if (modeofpayment == 'COD') {
            window.location.href = "insert_payment.php?status=success&mode=" + modeofpayment + "&address=" + address;
        }
        else {
            var amount = amount * 100;
            var options = {
                "key": "rzp_test_dRWiKHS7zr2Gki",
                "amount": amount,
                "name": "Food Club",
                "description": "ACET Food Club",
                "image": "https://www.pakistanijunction.com/wp-content/uploads/2013/10/foodclub-logo.jpg",
                "handler": function (response) {
                    //alert(response.razorpay_payment_id);
                    if (response.razorpay_payment_id == "") {
                        //alert('Failed');
                        window.location.href = "confirm_order.php?status=failed";
                    }
                    else {
                        //alert('Success');
                        window.location.href = "insert_payment.php?status=success&mode=" + modeofpayment + "&address=" + address;
                    }
                },
                "prefill": {
                    "name": "",
                    "email": user
                },
                "notes": {
                    "address": ""
                },
                "theme": {
                    "color": "#F37254"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        }
    }
}
function showmodal() {
    $("#msgmodal").modal('show');
}