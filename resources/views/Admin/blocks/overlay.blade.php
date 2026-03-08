<style>
    #formOverlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 9999;
      display: none;
    }

    .overlay-background {
      position: absolute;
      width: 100%;
      height: 100%;
      background: linear-gradient(135deg,rgb(64, 79, 94),rgb(89, 46, 110));
      backdrop-filter: blur(3px);
    }

    .spinner-wrapper {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      text-align: center;
    }

    .spinner {
      border: 6px solid #f3f3f3;
      border-top: 6px solid #ff9800;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      animation: spin 1s linear infinite;
      margin: 0 auto 10px;
    }

    .spinner-wrapper p {
      font-size: 16px;
      color: white;
      font-weight: bold;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
</style>
<div id="formOverlay">
  <div class="overlay-background"></div>
  <div class="spinner-wrapper">
    <div class="spinner"></div>
    <p>Đang xử lý...</p>
  </div>
</div>
<script>
  window.addEventListener('load', function () {
    document.getElementById('formOverlay').style.display = 'block';
    setTimeout(() => {
      document.getElementById('formOverlay').style.display = 'none';
    }, 500);
  });
</script>