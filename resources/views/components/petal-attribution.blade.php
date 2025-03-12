<div class="badge-container">
    <a href="https://petal.sh" class="petal-badge" target="_blank">
        <span class="flower">🌸</span>Created by petal.sh
    </a>
</div>

<style>
    .badge-container {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .petal-badge {
        display: inline-block;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        font-size: 12px;
        line-height: 1;
        text-decoration: none;
        background: #372b3a;
        color: #e2e8f0;
        padding: 8px 12px;
        border-radius: 4px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
        margin: 10px;
    }

    .petal-badge:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.15);
    }

    .petal-badge .flower {
        display: inline-block;
        margin-right: 6px;
        transform-origin: center;
        animation: subtle-pulse 4s infinite ease-in-out;
    }

    @keyframes subtle-pulse {

        0%,
        100% {
            transform: scale(1);
        }

        50% {
            transform: scale(1.1);
        }
    }
</style>
