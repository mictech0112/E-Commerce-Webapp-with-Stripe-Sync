document.getElementById('hamburgerBtn').addEventListener('click', function () {
    document.getElementById('menu').classList.toggle('hidden');
});

document.addEventListener("DOMContentLoaded", function () {
    let images = [
        "/images/top_image1.png",
        "/images/top_image2.png",
        "/images/top_image3.png"
    ];

    let currentIndex = 0;
    const slideImage = document.getElementById("slide-image");

    function updateImage(index) {
        slideImage.src = images[index];
    }

    // 自動スライド (3秒ごと)
    setInterval(() => {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage(currentIndex);
    }, 3000);

    // ボタンでスライド
    document.getElementById("prevBtn").addEventListener("click", function () {
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        updateImage(currentIndex);
    });

    document.getElementById("nextBtn").addEventListener("click", function () {
        currentIndex = (currentIndex + 1) % images.length;
        updateImage(currentIndex);
    });
});
