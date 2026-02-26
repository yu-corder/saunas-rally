window.showModal = function(date) {
    // 現在のURLにAjaxリクエストを飛ばす例
    fetch(window.location.href + '/add', {
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(response => response.json())
    .then(data => {
        console.log('サーバから届いたデータ:', data);
        console.log(data['html']);
        if (data.status === 'success') {
            const area = document.getElementById('form-display-area');
            const back_area = document.getElementById('form-display-area-overray');
            back_area.style.display = "block";
            area.style.display = "block";
            area.innerHTML = data.html;

            console.log(date);

            // 3. クリックした日付をフォームの隠しフィールドにセット
            document.getElementById('form-visit-date').value = date;
        }
    })
    .catch(error => console.error('エラー発生:', error));
};

window.closeModal = function() {
    document.getElementById('form-display-area-overray').style.display = 'none';
    document.getElementById('form-display-area').style.display = 'none';
};

