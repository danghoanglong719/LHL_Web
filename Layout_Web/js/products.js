var product = {
    'sp1': 'c1.jpg',
    'sp2': 'c13.jpg',
    'sp3': 'c4.jpg',
    'sp4': 'c6.jpg',
    'sp5': 'c8.jpg',
    'sp6': 'c9.jpg',
    'sp6': 'c10.jpg',
    'sp6': 'c11.jpg'

}
$(document).ready(function() {
    str = ''
    for (i in product) {
        str += '<div class="item ">' +
            ' <div class="col-xs-6 ">' +
            '<div class="card h-100 ">' +
            ' <div id="vi"></div>' +
            '<a href=""> <img class="card-img-top img-fluid " src="../img/' + product[i] + '"></a>' +
            ' <div class="card-body ">' +
            ' <div style="margin-bottom: 10px;text-align: center; ">' + '<h5>Sản Phẩm 1</h5>' + '<p class=" text-center">100.0000đ</p>' +
            '</div>' +
            '<div class="face-2 ">' +
            '<div class="icon-buy  justify-content-center">' +
            '<div> <a href="detail.html?id=' + product[i] + '  "><i class="far fa-eye " ></i></a></div>' +
            ' <div><a href=" "><i class="fas fa-shopping-cart " ></i></a></div>' + '</div>' +
            '<div id="buy"><a href="#">Mua Ngay</a></div>' +
            '</div></div></div></div></div>'
    }
    $('#hang .row #owl-2').replaceWith('<div class="owl-carousel owl-theme " id="owl-2">' + str + '</div>');
})