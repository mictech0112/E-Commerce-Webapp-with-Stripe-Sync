document.addEventListener('DOMContentLoaded', function() {
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const imageCount = document.getElementById('imageCount');
    
    // 画像リストを取得
    const images = [...thumbnails].map(thumb => thumb.src).filter(src => src !== "");
    
    let currentImageIndex = 0;

    function updateMainImage(index) {
        if (images.length === 0) {
            imageCount.textContent = "0/0";
            return;
        }
        mainImage.src = images[index];
        imageCount.textContent = `${index + 1}/${images.length}`;

        thumbnails.forEach(thumb => thumb.classList.remove('border-2', 'border-blue-500'));
        if (thumbnails[index]) {
            thumbnails[index].classList.add('border-2', 'border-blue-500');
        }
    }

    imageCount.textContent = images.length > 0 ? `1/${images.length}` : "0/0";

    thumbnails.forEach((thumbnail, index) => {
        thumbnail.addEventListener('click', () => {
            currentImageIndex = index;
            updateMainImage(currentImageIndex);
        });
    });

    prevBtn.addEventListener('click', () => {
        currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
        updateMainImage(currentImageIndex);
    });

    nextBtn.addEventListener('click', () => {
        currentImageIndex = (currentImageIndex + 1) % images.length;
        updateMainImage(currentImageIndex);
    });

    thumbnails[0].classList.add('border-2', 'border-blue-500');
});