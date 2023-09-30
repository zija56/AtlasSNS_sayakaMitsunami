// アコーディオンメニュー部分
$(function () {
  // タイトルをクリックすると
  $(".accordion-menu").on("click", function () {
    // クリックした次の要素(コンテンツ)を開閉
    $(this).next().slideToggle(300);
    // タイトルにopenクラスを付け外しして矢印の向きを変更
    $(this).toggleClass("open", 300);
  });
});
