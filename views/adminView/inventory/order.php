<div class="container ">
    <div class="profile-card card card-registration card-registration-2" style="border-radius: 15px;">
        <div class="d-flex align-items-center p-4">
                <div class="image-container">
                    <img src="views/assets/img/crown.png" alt="Sticker" class="sticker" id="sticker" style="top: 20px; left: 20px;">
                    <img src="views/assets/img/team-1.jpg" alt="Base Image" class="base-image">
                </div>
            <div class="ml-3" style="margin: 20px;">
                <h5 class="fw-bold mb-1" style="color: #4835d4;">Alec Thompson</h5>
                <p class="mb-0 text-success">500 order</p>
            </div>
        </div>
    </div>
</div>
<script>
        const sticker = document.getElementById('sticker');
        let isDragging = false;

        sticker.addEventListener('mousedown', (e) => {
            isDragging = true;
            const offsetX = e.clientX - sticker.getBoundingClientRect().left;
            const offsetY = e.clientY - sticker.getBoundingClientRect().top;

            const mouseMoveHandler = (e) => {
                if (isDragging) {
                    sticker.style.left = (e.clientX - offsetX) + 'px';
                    sticker.style.top = (e.clientY - offsetY) + 'px';
                }
            };

            const mouseUpHandler = () => {
                isDragging = false;
                document.removeEventListener('mousemove', mouseMoveHandler);
                document.removeEventListener('mouseup', mouseUpHandler);
            };

            document.addEventListener('mousemove', mouseMoveHandler);
            document.addEventListener('mouseup', mouseUpHandler);
        });
</script>