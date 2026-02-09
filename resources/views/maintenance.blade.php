<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="noindex, nofollow" />
    <title>TEKUN Online | Penyelenggaraan</title>
    <style>
      :root {
        --bg: #0e0b16;
        --bg2: #130f20;
        --ink: #f7f4ff;
        --muted: #c9c4d6;
        --accent: #f2b705;
        --accent2: #ff7a59;
        --card: rgba(255, 255, 255, 0.06);
        --border: rgba(255, 255, 255, 0.12);
        --shadow: 0 40px 120px rgba(0, 0, 0, 0.45);
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        min-height: 100vh;
        font-family: "Fraunces", "Playfair Display", "Georgia", serif;
        color: var(--ink);
        background: radial-gradient(1200px 800px at 20% -10%, #2a1f45 0%, transparent 60%),
          radial-gradient(900px 700px at 110% 20%, #3a1a2e 0%, transparent 55%),
          linear-gradient(180deg, var(--bg) 0%, var(--bg2) 100%);
        display: grid;
        place-items: center;
        padding: 24px;
      }

      .wrap {
        width: min(980px, 100%);
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
        gap: 28px;
        align-items: center;
      }

      .card {
        background: var(--card);
        border: 1px solid var(--border);
        border-radius: 24px;
        padding: 32px;
        box-shadow: var(--shadow);
        backdrop-filter: blur(10px);
      }

      .badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 8px 14px;
        border-radius: 999px;
        font-family: "Space Grotesk", "Segoe UI", sans-serif;
        font-size: 0.85rem;
        letter-spacing: 0.06em;
        text-transform: uppercase;
        color: #1a1303;
        background: linear-gradient(120deg, var(--accent), #ffd369);
      }

      .logo {
        width: 110px;
        height: 110px;
        object-fit: contain;
        margin-bottom: 18px;
        filter: drop-shadow(0 12px 18px rgba(0, 0, 0, 0.35));
      }

      h1 {
        margin: 18px 0 12px;
        font-size: clamp(2.2rem, 4vw, 3.4rem);
        line-height: 1.05;
      }

      p {
        margin: 0 0 18px;
        font-family: "Space Grotesk", "Segoe UI", sans-serif;
        color: var(--muted);
        font-size: 1.02rem;
      }

      .status {
        display: grid;
        gap: 12px;
        font-family: "Space Grotesk", "Segoe UI", sans-serif;
      }

      .pill {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 12px 16px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.12);
        font-size: 0.95rem;
      }

      .pill span {
        color: var(--accent);
        font-weight: 600;
      }

      .art {
        position: relative;
        min-height: 320px;
        display: grid;
        place-items: center;
      }

      .orb {
        width: clamp(180px, 28vw, 260px);
        height: clamp(180px, 28vw, 260px);
        border-radius: 50%;
        background: radial-gradient(circle at 30% 30%, #ffe29a, #f24f2d 55%, #4c1c5f 100%);
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
        position: relative;
        animation: float 6s ease-in-out infinite;
      }

      .orb::after {
        content: "";
        position: absolute;
        inset: -18%;
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.18);
        box-shadow: 0 0 30px rgba(255, 255, 255, 0.08);
      }

      .spark {
        position: absolute;
        width: 8px;
        height: 8px;
        background: var(--accent2);
        border-radius: 50%;
        box-shadow: 0 0 16px var(--accent2);
        animation: pulse 2.5s ease-in-out infinite;
      }

      .spark.one {
        top: 16%;
        left: 18%;
        animation-delay: 0.2s;
      }

      .spark.two {
        bottom: 20%;
        right: 14%;
        animation-delay: 1.1s;
      }

      .spark.three {
        top: 22%;
        right: 28%;
        animation-delay: 1.8s;
      }

      .footer {
        margin-top: 18px;
        font-family: "Space Grotesk", "Segoe UI", sans-serif;
        font-size: 0.9rem;
        color: var(--muted);
      }

      .footer a {
        color: var(--ink);
        text-decoration: none;
        border-bottom: 1px solid transparent;
      }

      .footer a:focus,
      .footer a:hover {
        border-color: var(--accent);
      }

      @keyframes float {
        0% {
          transform: translateY(0px);
        }
        50% {
          transform: translateY(-16px);
        }
        100% {
          transform: translateY(0px);
        }
      }

      @keyframes pulse {
        0%,
        100% {
          transform: scale(1);
          opacity: 0.8;
        }
        50% {
          transform: scale(1.7);
          opacity: 0.4;
        }
      }

      @media (max-width: 720px) {
        .card {
          padding: 24px;
        }
        .status {
          grid-template-columns: 1fr;
        }
      }
    </style>
    <link
      rel="preconnect"
      href="https://fonts.googleapis.com"
    />
    <link
      rel="preconnect"
      href="https://fonts.gstatic.com"
      crossorigin
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Fraunces:wght@400;600;700&family=Space+Grotesk:wght@400;500;600&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <main class="wrap">
      <section class="card">
        <img
          class="logo"
          src="{{ asset('images/logo-tekun.png') }}"
          alt="TEKUN Nasional"
        />
        <div class="badge">Penyelenggaraan Berjadual</div>
        <h1>Dalam penyelenggaraan</h1>
        <p>
          Terima kasih atas kesabaran anda. Pasukan kami sedang melaksanakan
          penambahbaikan pada Sistem TEKUN Online di belakang tabir.
        </p>
        <p>
          Sementara menunggu pengesahan tarikh go-live selepas selesai Ujian
          Penerimaan Akhir (Final Acceptance Test, FAT), akses awam ke Sistem
          Pinjaman Online TEKUN akan dihadkan buat sementara waktu.
        </p>
        <div class="status">
          <div class="pill">
            <strong>Status semasa</strong>
            <span> Dalam Mod Selenggara</span>
          </div>
          <div class="pill">
            <strong>Anggaran kembali</strong>
            <span>Dalam masa terdekat</span>
          </div>
          <div class="pill">
            <strong>Perlukan bantuan?</strong>
            <span>tekun.online@tekun.gov.my</span>
          </div>
        </div>
        <div class="footer">
          Untuk urusan segera, emel
          <a href="mailto:tekun.online@tekun.gov.my">tekun.online@tekun.gov.my</a>
        </div>
      </section>
      <section class="card art" aria-hidden="true">
        <div class="orb"></div>
        <span class="spark one"></span>
        <span class="spark two"></span>
        <span class="spark three"></span>
      </section>
    </main>
  </body>
</html>
