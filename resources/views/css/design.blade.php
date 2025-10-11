<style>
    footer {
        background-image: url('img/footer/left.png'), url('img/footer/right.png');
        background-position: left bottom, right bottom;
        background-repeat: no-repeat, no-repeat;
        background-size: contain, contain;
    }

    .text-outline {
        color: transparent;
        -webkit-text-stroke: 1px rgba(156, 163, 175, 0.5);
        /* gray-400 with opacity */
    }

    .outlined-number {
        -webkit-text-stroke: 1px #d1d5db;
        /* Gray-300 stroke */
        color: transparent;
    }

    .clip-diagonal {
        clip-path: polygon(10% 0, 100% 0, 100% 100%, 0 100%);
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    @keyframes scroll-right {
        0% {
            transform: translateX(-50%);
        }

        100% {
            transform: translateX(0);
        }
    }

    .animate-scroll-left {
        animation: scroll-left 45s linear infinite;
    }

    .animate-scroll-right {
        animation: scroll-right 45s linear infinite;
    }

    .animate-scroll-left:hover,
    .animate-scroll-right:hover {
        animation-play-state: paused;
    }

    .text-outline {
        color: transparent;
        -webkit-text-stroke: 1px #1e4d2b;
    }

    .clip-path-diagonal {
        clip-path: polygon(15% 0, 100% 0, 100% 100%, 0 100%);
    }

    .stroke-text {
        -webkit-text-stroke: 2px #345e1b;
        /* Outline color */
        color: transparent;
    }
</style>