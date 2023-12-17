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


$(function () {
  // 編集ボタン(class="js-modal-open")が押されたら発火
  $('.js-modal-open').on('click', function () {
    // モーダルの中身(class="js-modal")の表示
    $('.js-modal').fadeIn();
    // 押されたボタンから投稿内容を取得し変数へ格納
    var post = $(this).attr('post');
    // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）
    var post_id = $(this).attr('post_id');

    // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_post').text(post);
    // 取得した投稿のidをモーダルの中身へ渡す
    $('.modal_id').val(post_id);
    return false;
  });

  // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
  $('.js-modal-close').on('click', function () {
    // モーダルの中身(class="js-modal")を非表示
    $('.js-modal').fadeOut();
    return false;
  });
});

// フォロー機能
function follow(userId) {
  $.ajax({
    // これがないと419エラーが出ます
    headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
    url: `/follow/${userId}`,
    type: "POST",
  })
    .done((data) => {
      console.log(data);
    })
    .fail((data) => {
      console.log(data);
    });
};
