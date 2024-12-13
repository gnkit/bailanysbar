<style>
    .banner {
        position: relative;
        width: 100%;
        max-width: 600px;
        height: 200px;
        background: linear-gradient(135deg, #ff6a00, #ffca00, #4caf50, #1e88e5);
        background-size: 400% 400%;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        animation: gradientBG 6s ease infinite;
    }

    @keyframes gradientBG {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }

    .banner-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: #fff;
        animation: fadeIn 1s ease forwards;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            transform: translate(-50%, -60%);
        }

        100% {
            opacity: 1;
            transform: translate(-50%, -50%);
        }
    }

    .banner h1 {
        font-size: 1.8rem;
        margin: 0;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
    }

    .banner p {
        font-size: 1rem;
        margin: 10px 0 0;
    }

    .banner button {
        margin-top: 15px;
        padding: 10px 20px;
        font-size: 1rem;
        color: #fff;
        background: #ff5722;
        border: none;
        border-radius: 25px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .banner button:hover {
        background: #e64a19;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .banner {
            height: 150px;
        }

        .banner h1 {
            font-size: 1.4rem;
        }

        .banner p {
            font-size: 0.9rem;
        }

        .banner button {
            padding: 8px 15px;
            font-size: 0.9rem;
        }
    }

    @media (max-width: 574px) {
        .banner {
            height: 120px;
        }

        .banner h1 {
            font-size: 1.2rem;
        }

        .banner p {
            font-size: 0.8rem;
        }

        .banner button {
            padding: 6px 12px;
            font-size: 0.8rem;
        }
    }
</style>

<div class="banner">
    <div class="banner-content">
        <h1>Hot Sales Today!</h1>
        <p>Up to 70% OFF on all categories</p>
        <button>Shop Now</button>
    </div>
</div>
