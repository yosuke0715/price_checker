const LOCAL_URL = "http://localhost:8888/newApp/price_checker/price_checker/public/"

function getPriceMonth(month) {
    let URL = LOCAL_URL + "price/" + month;
    return window.location.href = URL;
}

function getDetailMonth(month) {
    let URL = LOCAL_URL + "detail/" + month;
    return window.location.href = URL;
}

function getSumPriceMonth(month) {
    let URL = LOCAL_URL + "total_pay/" + month;
    return window.location.href = URL;
}

$('#detail').click(function() {
    let URL = LOCAL_URL + "detail";
    return window.location.href = URL;
})
$('#savePrice').click(function() {
    let URL = LOCAL_URL + "save_price";
    return window.location.href = URL;
})

$('#del_btn').click(function() {
    let is_confirm = window.confirm('削除しますか？');
    if (!is_confirm) {
        return false;
    }
})

function check() {
    let comment = document.detail_form.comment.value;
    let price = document.detail_form.price.value;
    if (comment === "") {
        alert("内容を入力してください！");
        return false;
    }
    if (price === "") {
        alert("金額を入力してください！");
        return false;
    }
    if (isNaN(price)) {
        alert("数値で入力してください！");
        return false;
    }
    return true;
}

function homeCheck() {
    let price = document.home_form.price.value;
    if (price === "") {
        alert("金額を入力してください！");
        return false;
    }
    if (isNaN(price)) {
        alert("数値で入力してください！");
        return false;
    }
    return true;
}

function sumPriceCheck() {
    let rent = document.price_form.rent.value;
    let gas = document.price_form.gas.value;
    let water = document.price_form.water.value;
    let ele = document.price_form.ele.value;
    let wifi = document.price_form.wifi.value;
    if (rent === "" || gas === "" || water === "" || ele === "" || wifi === "") {
        alert("金額を入力してください！");
        return false;
    }
    if (isNaN(rent) && isNaN(gas) && isNaN(water) && isNaN(ele) && isNaN(wifi)) {
        alert("数値で入力してください！");
        return false;
    }
    return true;
}