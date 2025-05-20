<style>
    * {
    margin: 0; padding: 0; box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    h2 {
        color: #2c3e50;
        font-weight: 700;
        margin-bottom: 25px;
        border-bottom: 3px solid #3498db;
        padding-bottom: 8px;
    }
    .images-day {
        width: 140px;
        height: 100px;
        margin-right: 20px;
        flex-shrink: 0;
        overflow: hidden;
        border-radius: 8px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .images-day img {
        width: 100%;
        height: 100%; 
        object-fit: cover;
        display: block;
        border-radius: 8px;
    }
    /* Tour Day Box */
    .tour-day {
        background: white;
        border-radius: 10px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.07);
        margin-bottom: 20px;
        overflow: hidden;
        transition: box-shadow 0.3s ease;
        cursor: pointer;
    }
    .tour-day:hover {
        box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
    }

    .day-header {
        display: flex;
        align-items: center;
        padding: 15px 20px;
        position: relative;
    }
    .day-img {
        width: 140px;
        height: 100px;
        object-fit: cover;
        border-radius: 8px;
        flex-shrink: 0;
        margin-right: 20px;
        box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    }
    .day-title {
        flex: 1;
    }
    .day-num {
        font-weight: 600;
        font-size: 17px;
        color: #3498db;
        margin-bottom: 6px;
    }
    .day-places {
        font-weight: 700;
        font-size: 18px;
        color: #34495e;
        margin-bottom: 5px;
    }
    .day-meals {
        font-size: 14px;
        color: #7f8c8d;
    }

    /* Arrow */
    .arrow {
        font-size: 18px;
        color: #95a5a6;
        transition: transform 0.3s ease;
        user-select: none;
        margin-left: 10px;
    }
    .arrow.active {
        transform: rotate(180deg);
    }
    .day-content {
        max-height: 0;
        overflow: hidden;
        background-color: #f9fbff;
        transition: max-height 0.5s ease, padding 0.5s ease;
        padding: 0 20px;
    }
    .day-content.active {
        max-height: 600px;
        padding: 20px;
    }
    .content-inner h3 {
        color: #2c3e50;
        margin-bottom: 15px;
    }
    .content-inner p {
        color: #444;
        line-height: 1.5;
        margin-bottom: 12px;
    }

    /* Responsive */
    @media (max-width: 600px) {
        .day-header {
            flex-direction: column;
            align-items: flex-start;
        }
        .day-img {
            width: 100%;
            height: auto;
            margin-bottom: 12px;
        }
        .arrow {
            position: absolute;
            right: 20px;
            top: 18px;
        }
    }

</style>
<div class="container">
    <h2>Lịch trình cho tour: {{ $tour->title }}</h2>

    @if($itineraries->count())
        @foreach($itineraries as $item)
        <div class="tour-day">
            <div class="day-header" tabindex="0" role="button" aria-expanded="false" aria-controls="day-content-{{ $item->day }}" onclick="toggleDay(this)">
                <figure class="images-day">
                    @if($tour->firstImage)
                        <img src="{{ $tour->firstImage->imageURL }}" alt="{{ $tour->title }}">
                    @else
                        <img src="{{ asset('clients/img/default-image.jpg') }}" alt="No image">
                    @endif
                </figure>
                <div class="day-title">
                    <div class="day-num">Ngày {{ $item->day }}</div>
                    <div class="day-places">{{ $item->title }}</div>
                </div>
                <span class="arrow" aria-hidden="true">▼</span>
            </div>
            <div class="day-content" id="day-content-{{ $item->day }}" aria-hidden="true">
                <div class="content-inner">
                    <h3>{{ $item->title }}</h3>
                    <p>{{ $item->description }}</p>
                    @if($item->information)
                        <div class="highlight">
                            <strong>Lưu ý:</strong> {{ $item->information }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    @else
        <p>Không có lịch trình nào cho tour này.</p>
    @endif
</div>

<script>
    function toggleDay(element) {
        const arrow = element.querySelector('.arrow');
        const content = element.nextElementSibling;
        const isActive = content.classList.contains('active');
        document.querySelectorAll('.day-content.active').forEach(openContent => {
            if(openContent !== content){
                openContent.classList.remove('active');
                const openHeader = openContent.previousElementSibling;
                openHeader.querySelector('.arrow').classList.remove('active');
                openHeader.setAttribute('aria-expanded', 'false');
                openContent.setAttribute('aria-hidden', 'true');
            }
        });

        if(isActive){
            content.classList.remove('active');
            arrow.classList.remove('active');
            element.setAttribute('aria-expanded', 'false');
            content.setAttribute('aria-hidden', 'true');
        } else {
            content.classList.add('active');
            arrow.classList.add('active');
            element.setAttribute('aria-expanded', 'true');
            content.setAttribute('aria-hidden', 'false');
        }
    }
</script>
