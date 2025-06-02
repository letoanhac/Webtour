<style>
  #formOverlay {
    position: fixed;
    top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 9999;
    background: rgba(255, 255, 255, 0.85);
    backdrop-filter: blur(4px);
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .logo-spinner {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    animation: rotateLogo 3s linear infinite;
    margin-bottom: 30px;
    box-shadow: 0 0 20px rgba(0, 191, 255, 0.5);
  }

  @keyframes rotateLogo {
    0% { transform: rotate(0deg);}
    100% { transform: rotate(360deg);}
  }

  .progress-bar {
    width: 70%;
    height: 22px;
    background: #eee;
    border-radius: 40px;
    overflow: hidden;
    box-shadow: 0 0 8px #aaa;
    position: relative;
  }

  .progress-bar-fill {
    height: 100%;
    width: 0;
    background: linear-gradient(270deg, #ff9800, #ff5722, #2196f3, #4caf50);
    background-size: 600% 600%;
    animation: gradientAnim 3s ease infinite, fillProgress 4s linear forwards;
    box-shadow: 0 0 15px rgba(255, 87, 34, 0.7);
  }

  @keyframes gradientAnim {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
  }

  @keyframes fillProgress {
    from { width: 0; }
    to { width: 100%; }
  }
</style>

<div id="formOverlay">
  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQZxaKoaTn3vT10ITdaOyPw4AY4jeoPpIs7mA&s" class="logo-spinner" alt="Spinning Logo">
  <div class="progress-bar">
    <div class="progress-bar-fill" id="progressFill"></div>
    <p>Đang tải tour ... vui lòng đợi!!</p>
  </div>

  <audio id="loadSound" preload="auto">
    <source src="https://cdn.pixabay.com/audio/2022/03/15/audio_82bfa3d915.mp3" type="audio/mpeg">
  </audio>
</div>

<script>
  const overlay = document.getElementById('formOverlay');
  const audio = document.getElementById('loadSound');
    document.body.style.overflow = 'hidden';

window.addEventListener('load', () => {
audio.volume = 0.3;
audio.play();

    setTimeout(() => {
    overlay.style.display = 'none';
    audio.pause();
    document.body.style.overflow = ''
    }, 10);
}, 10
);
</script>
