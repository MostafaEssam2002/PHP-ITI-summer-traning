class PureJSSlider {
    constructor() {
        this.currentSlide = 0;
        this.totalSlides = 5;
        this.isPlaying = false;
        this.autoPlayInterval = null;
        this.autoPlayDelay = 30;

        this.createStyles();
        this.createSlider();
        this.bindEvents();
    }

    createStyles() {
        const style = document.createElement('style');
        style.textContent = `
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: Arial, sans-serif;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                min-height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }

            .slider-container {
                max-width: 800px;
                width: 100%;
                background: white;
                border-radius: 15px;
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
                overflow: hidden;
            }

            .slider-header {
                background: #333;
                color: white;
                padding: 15px 25px;
                font-size: 24px;
                font-weight: bold;
            }

            .slider-wrapper {
                position: relative;
                width: 100%;
                height: 400px;
                overflow: hidden;
                border: 8px solid #f39c12;
                border-bottom: none;
            }

            .slides {
                display: flex;
                width: 500%;
                height: 100%;
                transition: transform 0.5s ease-in-out;
            }

            .slide {
                width: 20%;
                height: 100%;
                position: relative;
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 48px;
                font-weight: bold;
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            }

            .controls {
                display: flex;
                justify-content: center;
                background: #f39c12;
                padding: 0;
            }

            .control-btn {
                flex: 1;
                padding: 15px;
                border: none;
                cursor: pointer;
                font-size: 18px;
                font-weight: bold;
                transition: all 0.3s ease;
                color: white;
            }

            .prev-btn, .next-btn {
                background: #f39c12;
            }

            .prev-btn:hover, .next-btn:hover {
                background: #e67e22;
            }

            .play-btn {
                background: #27ae60;
            }

            .play-btn:hover {
                background: #229954;
            }

            .stop-btn {
                background: #e74c3c;
            }

            .stop-btn:hover {
                background: #c0392b;
            }

            .slide-counter {
                position: absolute;
                top: 15px;
                right: 15px;
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 14px;
                z-index: 10;
            }

            .indicators {
                display: flex;
                justify-content: center;
                padding: 15px;
                background: white;
                gap: 10px;
            }

            .indicator {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                background: #bdc3c7;
                cursor: pointer;
                transition: all 0.3s ease;
            }

            .indicator.active {
                background: #f39c12;
                transform: scale(1.3);
            }

            .play-status {
                position: absolute;
                top: 15px;
                left: 15px;
                background: rgba(0, 0, 0, 0.7);
                color: white;
                padding: 8px 15px;
                border-radius: 20px;
                font-size: 14px;
                z-index: 10;
                display: none;
            }

            .play-status.playing {
                display: block;
                background: rgba(39, 174, 96, 0.8);
            }
        `;
        document.head.appendChild(style);
    }

    createSlider() {
        // Main container
        this.container = document.createElement('div');
        this.container.className = 'slider-container';

        // Header
        this.header = document.createElement('div');
        this.header.className = 'slider-header';
        this.header.textContent = '4. Slider';
        this.container.appendChild(this.header);

        // Slider wrapper
        this.wrapper = document.createElement('div');
        this.wrapper.className = 'slider-wrapper';

        // Slide counter
        this.slideCounter = document.createElement('div');
        this.slideCounter.className = 'slide-counter';
        this.currentSlideSpan = document.createElement('span');
        this.currentSlideSpan.textContent = '1';
        this.totalSlidesSpan = document.createElement('span');
        this.totalSlidesSpan.textContent = '5';
        this.slideCounter.appendChild(this.currentSlideSpan);
        this.slideCounter.appendChild(document.createTextNode(' / '));
        this.slideCounter.appendChild(this.totalSlidesSpan);
        this.wrapper.appendChild(this.slideCounter);

        // Play status
        this.playStatus = document.createElement('div');
        this.playStatus.className = 'play-status';
        this.playStatus.textContent = '▶ Playing';
        this.wrapper.appendChild(this.playStatus);

        // Slides container
        this.slides = document.createElement('div');
        this.slides.className = 'slides';

        // Create slides
        const slideColors = [
            'linear-gradient(45deg, #ff6b6b, #ee5a24)',
            'linear-gradient(45deg, #4834d4, #686de0)',
            'linear-gradient(45deg, #00d2d3, #54a0ff)',
            'linear-gradient(45deg, #ff9ff3, #f368e0)',
            'linear-gradient(45deg, #feca57, #ff9f43)'
        ];

        for (let i = 0; i < this.totalSlides; i++) {
            const slide = document.createElement('div');
            slide.className = 'slide';
            slide.style.background = slideColors[i];
            slide.textContent = `Slide ${i + 1}`;
            this.slides.appendChild(slide);
        }

        this.wrapper.appendChild(this.slides);
        this.container.appendChild(this.wrapper);

        // Controls
        this.controls = document.createElement('div');
        this.controls.className = 'controls';

        this.prevBtn = document.createElement('button');
        this.prevBtn.className = 'control-btn prev-btn';
        this.prevBtn.textContent = '‹';

        this.playBtn = document.createElement('button');
        this.playBtn.className = 'control-btn play-btn';
        this.playBtn.textContent = 'play';

        this.stopBtn = document.createElement('button');
        this.stopBtn.className = 'control-btn stop-btn';
        this.stopBtn.textContent = 'stop';

        this.nextBtn = document.createElement('button');
        this.nextBtn.className = 'control-btn next-btn';
        this.nextBtn.textContent = '›';

        this.controls.appendChild(this.prevBtn);
        this.controls.appendChild(this.playBtn);
        this.controls.appendChild(this.stopBtn);
        this.controls.appendChild(this.nextBtn);
        this.container.appendChild(this.controls);

        // Indicators
        this.indicatorsContainer = document.createElement('div');
        this.indicatorsContainer.className = 'indicators';

        this.indicators = [];
        for (let i = 0; i < this.totalSlides; i++) {
            const indicator = document.createElement('div');
            indicator.className = 'indicator';
            if (i === 0) indicator.classList.add('active');
            indicator.dataset.slide = i;
            this.indicators.push(indicator);
            this.indicatorsContainer.appendChild(indicator);
        }

        this.container.appendChild(this.indicatorsContainer);

        // Add to DOM
        document.body.appendChild(this.container);

        this.updateSlidePosition();
    }

    bindEvents() {
        this.playBtn.addEventListener('click', () => this.play());
        this.stopBtn.addEventListener('click', () => this.stop());
        this.prevBtn.addEventListener('click', () => this.prevSlide());
        this.nextBtn.addEventListener('click', () => this.nextSlide());

        // Indicator clicks
        this.indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => this.goToSlide(index));
        });

        // Keyboard navigation
        document.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowLeft') this.prevSlide();
            if (e.key === 'ArrowRight') this.nextSlide();
            if (e.key === ' ') {
                e.preventDefault();
                this.isPlaying ? this.stop() : this.play();
            }
        });

        // Pause on hover
        this.slides.addEventListener('mouseenter', () => {
            if (this.isPlaying) {
                this.pauseAutoPlay();
            }
        });

        this.slides.addEventListener('mouseleave', () => {
            if (this.isPlaying) {
                this.startAutoPlay();
            }
        });
    }

    updateSlidePosition() {
        const translateX = -this.currentSlide * 20;
        this.slides.style.transform = `translateX(${translateX}%)`;
    }

    updateUI() {
        this.currentSlideSpan.textContent = this.currentSlide + 1;
        
        // Update indicators
        this.indicators.forEach((indicator, index) => {
            indicator.classList.toggle('active', index === this.currentSlide);
        });

        // Update play status
        this.playStatus.classList.toggle('playing', this.isPlaying);
    }

    nextSlide() {
        this.currentSlide = (this.currentSlide + 1) % this.totalSlides;
        this.updateSlidePosition();
        this.updateUI();
    }

    prevSlide() {
        this.currentSlide = (this.currentSlide - 1 + this.totalSlides) % this.totalSlides;
        this.updateSlidePosition();
        this.updateUI();
    }

    goToSlide(index) {
        this.currentSlide = index;
        this.updateSlidePosition();
        this.updateUI();
    }

    play() {
        if (this.isPlaying) return;
        
        this.isPlaying = true;
        this.startAutoPlay();
        this.updateUI();
        
        // Visual feedback
        this.playBtn.style.background = '#27ae60';
        setTimeout(() => {
            this.playBtn.style.background = '';
        }, 200);
    }

    stop() {
        if (!this.isPlaying) return;
        
        this.isPlaying = false;
        this.pauseAutoPlay();
        this.updateUI();
        
        // Visual feedback
        this.stopBtn.style.background = '#e74c3c';
        setTimeout(() => {
            this.stopBtn.style.background = '';
        }, 200);
    }

    startAutoPlay() {
        this.autoPlayInterval = setInterval(() => {
            this.nextSlide();
        }, this.autoPlayDelay);
    }

    pauseAutoPlay() {
        if (this.autoPlayInterval) {
            clearInterval(this.autoPlayInterval);
            this.autoPlayInterval = null;
        }
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    new PureJSSlider();
});