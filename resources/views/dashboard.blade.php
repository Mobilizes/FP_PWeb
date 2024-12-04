<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 text-gray-800">

    <!-- Header -->
    <header class="bg-green-700 text-white py-4">
        <div class="container mx-auto flex justify-between  px-4 items-center">
            <h1 class="text-xl font-bold">ecoswap Dashboard</h1>
            <button class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">Logout</button>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 flex gap-4">

        <!-- Menu Section -->
        <section class="bg-white basis-1/5 rounded shadow-lg p-6 mb-6">
            <!-- <h2 class="text-2xl font-bold text-green-700 mb-4">Profile</h2> -->
             <div class="flex justify-center items-center py-4">
                 <svg width="60" height="60" viewBox="0 0 160 160" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <rect width="160" height="160" rx="22" fill="#A1EEBD"/>
            <path d="M54.1 110.05C52.7 110.05 51.25 109.75 49.75 109.15C48.25 108.6 47.15 107.7 46.45 106.45C45 105.8 43.95 104.775 43.3 103.375C42.7 101.925 42.45 100.325 42.55 98.575C42.95 92.525 43.275 86.475 43.525 80.425C43.775 74.375 44.25 68.325 44.95 62.275C43.95 61.375 43.05 60.4 42.25 59.35C41.5 58.25 41.125 57.325 41.125 56.575C41.125 55.775 41.6 55.375 42.55 55.375C43.25 55.375 44.4 55.325 46 55.225C47.6 55.075 49.35 54.925 51.25 54.775C53.15 54.575 54.975 54.425 56.725 54.325C58.475 54.175 59.85 54.1 60.85 54.1C63.75 54.1 66.1 54.5 67.9 55.3C69.75 56.1 71.1 57.125 71.95 58.375C72.85 59.575 73.3 60.85 73.3 62.2C73.3 62.7 73.05 62.95 72.55 62.95C72.1 62.95 71.675 62.95 71.275 62.95C70.875 62.9 70.475 62.875 70.075 62.875C67.825 62.875 65.475 63 63.025 63.25C60.575 63.5 58.3 63.775 56.2 64.075C55.75 68.025 55.375 72.075 55.075 76.225C57.425 75.925 59.475 75.775 61.225 75.775C61.975 75.775 62.85 76 63.85 76.45C64.9 76.85 65.9 77.375 66.85 78.025C67.8 78.675 68.6 79.375 69.25 80.125C69.9 80.825 70.225 81.475 70.225 82.075C70.225 82.975 70 83.55 69.55 83.8C69.1 84.05 68.4 84.175 67.45 84.175C66.55 84.175 65.35 84.275 63.85 84.475C62.4 84.675 60.825 84.9 59.125 85.15C57.475 85.35 55.925 85.5 54.475 85.6C54.325 88 54.2 90.425 54.1 92.875C54 95.275 53.925 97.675 53.875 100.075C55.925 98.725 57.9 97.65 59.8 96.85C61.7 96 63.4 95.575 64.9 95.575C65.9 95.575 67.025 95.875 68.275 96.475C69.525 97.075 70.625 97.825 71.575 98.725C72.525 99.575 73 100.375 73 101.125C73 101.775 72.7 102.225 72.1 102.475L54.1 110.05Z" fill="#FAFAFA"/>
            <path d="M106.125 109.975C100.475 109.975 96.2 108.85 93.3 106.6C90.45 104.35 89.025 101.625 89.025 98.425C89.025 96.775 89.3 95.475 89.85 94.525C90.45 93.525 91.3 93.025 92.4 93.025C93.5 94.725 94.9 96.225 96.6 97.525C98.35 98.775 100.15 99.75 102 100.45C103.85 101.1 105.475 101.425 106.875 101.425C107.975 101.425 108.85 101.225 109.5 100.825C110.2 100.375 110.55 99.675 110.55 98.725C110.55 98.075 110.425 97.475 110.175 96.925C109.975 96.375 109.4 95.8 108.45 95.2C107.55 94.55 106.075 93.85 104.025 93.1L101.475 92.125C98.675 91.025 96.45 89.95 94.8 88.9C93.2 87.85 92.05 86.65 91.35 85.3C90.7 83.95 90.375 82.325 90.375 80.425C90.375 78.625 90.725 76.6 91.425 74.35C92.175 72.1 93.175 69.825 94.425 67.525C95.725 65.225 97.225 63.1 98.925 61.15C100.625 59.2 102.45 57.625 104.4 56.425C106.35 55.225 108.375 54.625 110.475 54.625C112.225 54.625 113.7 54.825 114.9 55.225C116.1 55.575 117.25 56.475 118.35 57.925C119.7 58.325 120.775 59 121.575 59.95C122.375 60.85 122.95 61.8 123.3 62.8C123.65 63.75 123.825 64.575 123.825 65.275C123.825 66.575 123.575 68.05 123.075 69.7C122.575 71.35 122.025 73.025 121.425 74.725C120.825 76.425 120.325 78 119.925 79.45C119.825 79.9 119.675 80.275 119.475 80.575C119.275 80.875 118.9 81.025 118.35 81.025C117.55 81.025 116.575 80.65 115.425 79.9C114.325 79.1 113.35 78.075 112.5 76.825C111.65 75.575 111.225 74.3 111.225 73C111.225 72 111.4 70.9 111.75 69.7C112.1 68.5 112.45 67.375 112.8 66.325C113.15 65.225 113.325 64.4 113.325 63.85C113.325 63.5 113.3 63.225 113.25 63.025C113.2 62.825 113 62.725 112.65 62.725C111.8 62.725 110.8 63.3 109.65 64.45C108.55 65.55 107.45 66.975 106.35 68.725C105.3 70.425 104.425 72.25 103.725 74.2C103.025 76.1 102.675 77.85 102.675 79.45C102.675 80.3 103.075 81.15 103.875 82C104.725 82.85 106.25 83.7 108.45 84.55L110.775 85.45C114.375 86.85 117.05 88.2 118.8 89.5C120.55 90.75 121.675 92.025 122.175 93.325C122.725 94.575 123 95.875 123 97.225C123 101.225 121.475 104.35 118.425 106.6C115.425 108.85 111.325 109.975 106.125 109.975Z" fill="#FAFAFA"/>
            <path d="M144.882 105.472C145.142 104.985 144.959 104.379 144.472 104.118C143.985 103.858 143.379 104.041 143.118 104.528L144.882 105.472ZM23.5 100L21.2608 111.328L32.1906 107.603L23.5 100ZM143.118 104.528C142.797 105.129 142.471 105.722 142.14 106.306L143.881 107.291C144.22 106.692 144.553 106.086 144.882 105.472L143.118 104.528ZM140.101 109.725C139.377 110.875 138.635 111.992 137.875 113.075L139.512 114.224C140.292 113.113 141.052 111.968 141.793 110.791L140.101 109.725ZM135.493 116.292C134.664 117.353 133.818 118.377 132.954 119.368L134.462 120.682C135.349 119.665 136.218 118.612 137.069 117.524L135.493 116.292ZM130.248 122.302C129.306 123.268 128.346 124.196 127.371 125.086L128.72 126.563C129.724 125.647 130.711 124.692 131.68 123.699L130.248 122.302ZM124.344 127.691C123.301 128.535 122.243 129.34 121.171 130.105L122.333 131.733C123.438 130.944 124.528 130.115 125.602 129.245L124.344 127.691ZM117.859 132.32C116.722 133.03 115.572 133.699 114.41 134.328L115.362 136.087C116.56 135.438 117.747 134.748 118.919 134.016L117.859 132.32ZM110.84 136.116C109.626 136.677 108.401 137.196 107.168 137.674L107.89 139.539C109.163 139.046 110.426 138.51 111.679 137.932L110.84 136.116ZM103.405 138.995C102.132 139.397 100.852 139.757 99.5664 140.075L100.047 142.016C101.373 141.688 102.694 141.317 104.007 140.902L103.405 138.995ZM95.6673 140.91C94.3554 141.148 93.0399 141.344 91.7229 141.499L91.956 143.485C93.3143 143.326 94.6711 143.124 96.0245 142.878L95.6673 140.91ZM87.7467 141.84C86.4155 141.913 85.0848 141.944 83.7567 141.934L83.7416 143.934C85.1109 143.944 86.4829 143.912 87.8556 143.837L87.7467 141.84ZM79.7685 141.781C78.4393 141.689 77.1149 141.556 75.7973 141.383L75.5372 143.366C76.8952 143.544 78.2603 143.681 79.6304 143.776L79.7685 141.781ZM71.8579 140.743C70.5503 140.49 69.252 140.196 67.9648 139.864L67.4649 141.801C68.7914 142.143 70.1295 142.445 71.4771 142.707L71.8579 140.743ZM64.1328 138.749C62.8665 138.338 61.6136 137.888 60.3765 137.401L59.6436 139.262C60.9189 139.764 62.2102 140.228 63.5155 140.651L64.1328 138.749ZM56.7105 135.825C55.5048 135.262 54.3171 134.661 53.1495 134.025L52.1919 135.78C53.3961 136.437 54.6209 137.056 55.8641 137.637L56.7105 135.825ZM49.7088 132.005C48.584 131.297 47.4815 130.552 46.4035 129.773L45.2319 131.394C46.3445 132.198 47.4822 132.966 48.6426 133.698L49.7088 132.005ZM43.2488 127.335C42.2253 126.489 41.2282 125.61 40.2597 124.697L38.8881 126.153C39.8885 127.095 40.9183 128.004 41.9752 128.877L43.2488 127.335ZM37.4507 121.87C36.5481 120.899 35.6759 119.896 34.8359 118.862L33.2835 120.123C34.1517 121.192 35.0533 122.228 35.9859 123.231L37.4507 121.87ZM32.4285 115.685C31.665 114.604 30.935 113.493 30.2404 112.352L28.5323 113.393C29.2505 114.572 30.0053 115.721 30.7947 116.839L32.4285 115.685ZM28.2853 108.883C27.677 107.713 27.1045 106.515 26.5696 105.291L24.7368 106.091C25.2898 107.357 25.8817 108.595 26.5107 109.805L28.2853 108.883ZM144.882 105.472C145.142 104.985 144.959 104.379 144.472 104.118C143.985 103.858 143.379 104.041 143.118 104.528L144.882 105.472ZM23.5 100L21.2608 111.328L32.1906 107.603L23.5 100ZM143.118 104.528C142.797 105.129 142.471 105.722 142.14 106.306L143.881 107.291C144.22 106.692 144.553 106.086 144.882 105.472L143.118 104.528ZM140.101 109.725C139.377 110.875 138.635 111.992 137.875 113.075L139.512 114.224C140.292 113.113 141.052 111.968 141.793 110.791L140.101 109.725ZM135.493 116.292C134.664 117.353 133.818 118.377 132.954 119.368L134.462 120.682C135.349 119.665 136.218 118.612 137.069 117.524L135.493 116.292ZM130.248 122.302C129.306 123.268 128.346 124.196 127.371 125.086L128.72 126.563C129.724 125.647 130.711 124.692 131.68 123.699L130.248 122.302ZM124.344 127.691C123.301 128.535 122.243 129.34 121.171 130.105L122.333 131.733C123.438 130.944 124.528 130.115 125.602 129.245L124.344 127.691ZM117.859 132.32C116.722 133.03 115.572 133.699 114.41 134.328L115.362 136.087C116.56 135.438 117.747 134.748 118.919 134.016L117.859 132.32ZM110.84 136.116C109.626 136.677 108.401 137.196 107.168 137.674L107.89 139.539C109.163 139.046 110.426 138.51 111.679 137.932L110.84 136.116ZM103.405 138.995C102.132 139.397 100.852 139.757 99.5664 140.075L100.047 142.016C101.373 141.688 102.694 141.317 104.007 140.902L103.405 138.995ZM95.6673 140.91C94.3554 141.148 93.0399 141.344 91.7229 141.499L91.956 143.485C93.3143 143.326 94.6711 143.124 96.0245 142.878L95.6673 140.91ZM87.7467 141.84C86.4155 141.913 85.0848 141.944 83.7567 141.934L83.7416 143.934C85.1109 143.944 86.4829 143.912 87.8556 143.837L87.7467 141.84ZM79.7685 141.781C78.4393 141.689 77.1149 141.556 75.7973 141.383L75.5372 143.366C76.8952 143.544 78.2603 143.681 79.6304 143.776L79.7685 141.781ZM71.8579 140.743C70.5503 140.49 69.252 140.196 67.9648 139.864L67.4649 141.801C68.7914 142.143 70.1295 142.445 71.4771 142.707L71.8579 140.743ZM64.1328 138.749C62.8665 138.338 61.6136 137.888 60.3765 137.401L59.6436 139.262C60.9189 139.764 62.2102 140.228 63.5155 140.651L64.1328 138.749ZM56.7105 135.825C55.5048 135.262 54.3171 134.661 53.1495 134.025L52.1919 135.78C53.3961 136.437 54.6209 137.056 55.8641 137.637L56.7105 135.825ZM49.7088 132.005C48.584 131.297 47.4815 130.552 46.4035 129.773L45.2319 131.394C46.3445 132.198 47.4822 132.966 48.6426 133.698L49.7088 132.005ZM43.2488 127.335C42.2253 126.489 41.2282 125.61 40.2597 124.697L38.8881 126.153C39.8885 127.095 40.9183 128.004 41.9752 128.877L43.2488 127.335ZM37.4507 121.87C36.5481 120.899 35.6759 119.896 34.8359 118.862L33.2835 120.123C34.1517 121.192 35.0533 122.228 35.9859 123.231L37.4507 121.87ZM32.4285 115.685C31.665 114.604 30.935 113.493 30.2404 112.352L28.5323 113.393C29.2505 114.572 30.0053 115.721 30.7947 116.839L32.4285 115.685ZM28.2853 108.883C27.677 107.713 27.1045 106.515 26.5696 105.291L24.7368 106.091C25.2898 107.357 25.8817 108.595 26.5107 109.805L28.2853 108.883Z" fill="#FAFAFA"/>
            <path d="M23.1149 53.0346C22.8579 53.5234 23.0457 54.128 23.5345 54.3851C24.0234 54.6421 24.628 54.4543 24.8851 53.9655L23.1149 53.0346ZM142 56.5L143.799 45.0939L133.021 49.2393L142 56.5ZM24.8851 53.9655C25.1921 53.3816 25.5045 52.805 25.822 52.2356L24.0752 51.2615C23.7497 51.8453 23.4295 52.4363 23.1149 53.0346L24.8851 53.9655ZM27.7942 48.8956C28.4904 47.7814 29.2073 46.6975 29.944 45.6439L28.3049 44.4978C27.5484 45.5799 26.8123 46.6926 26.098 47.8359L27.7942 48.8956ZM32.2597 42.5122C33.0653 41.4819 33.8908 40.4838 34.7349 39.5179L33.229 38.2018C32.3608 39.1952 31.512 40.2214 30.6841 41.2804L32.2597 42.5122ZM37.368 36.6697C38.2816 35.7355 39.2139 34.8357 40.1635 33.9699L38.816 32.492C37.8381 33.3835 36.8784 34.3099 35.9381 35.2713L37.368 36.6697ZM43.1125 31.4342C44.1258 30.6132 45.1559 29.8282 46.2013 29.0789L45.0361 27.4533C43.9588 28.2256 42.8973 29.0345 41.8534 29.8803L43.1125 31.4342ZM49.4218 26.9125C50.5224 26.219 51.6372 25.5627 52.7648 24.9434L51.802 23.1904C50.6394 23.829 49.49 24.5056 48.3556 25.2205L49.4218 26.9125ZM56.2197 23.1792C57.3956 22.6228 58.5829 22.1047 59.7799 21.6247L59.0355 19.7684C57.8011 20.2634 56.5768 20.7976 55.3643 21.3713L56.2197 23.1792ZM63.4267 20.2889C64.6592 19.8794 65.8999 19.5088 67.1467 19.1769L66.6322 17.2442C65.3465 17.5865 64.0671 17.9687 62.7961 18.391L63.4267 20.2889ZM70.9266 18.2924C72.1983 18.0351 73.4743 17.8172 74.7529 17.6383L74.4757 15.6576C73.1573 15.8421 71.8414 16.0668 70.5301 16.3321L70.9266 18.2924ZM78.6116 17.2169C79.904 17.1153 81.1971 17.0531 82.4886 17.0301L82.453 15.0304C81.121 15.0541 79.7876 15.1183 78.4548 15.2231L78.6116 17.2169ZM86.37 17.0787C87.6649 17.1343 88.9563 17.2293 90.2422 17.3635L90.4497 15.3743C89.1234 15.2359 87.7914 15.1379 86.4558 15.0805L86.37 17.0787ZM94.089 17.8843C95.3663 18.0973 96.6359 18.3495 97.8958 18.6404L98.3459 16.6917C97.0458 16.3915 95.7358 16.1313 94.418 15.9115L94.089 17.8843ZM101.648 19.6307C102.888 19.9996 104.116 20.4071 105.33 20.853L106.02 18.9756C104.766 18.5152 103.498 18.0945 102.218 17.7137L101.648 19.6307ZM108.927 22.3048C110.11 22.8262 111.276 23.3855 112.425 23.9824L113.347 22.2079C112.16 21.5911 110.956 21.0133 109.734 20.4749L108.927 22.3048ZM115.807 25.8813C116.911 26.5493 117.996 27.2543 119.058 27.9959L120.203 26.3556C119.104 25.589 117.983 24.8604 116.842 24.17L115.807 25.8813ZM122.163 30.3167C123.168 31.121 124.15 31.9609 125.107 32.836L126.457 31.36C125.467 30.4551 124.452 29.5867 123.412 28.7551L122.163 30.3167ZM127.879 35.5437C128.768 36.4715 129.631 37.4331 130.467 38.4284L131.999 37.1425C131.135 36.1135 130.242 35.1192 129.323 34.1598L127.879 35.5437ZM132.861 41.4779C133.621 42.5133 134.352 43.5806 135.054 44.6794L136.74 43.603C136.015 42.4678 135.259 41.365 134.474 40.2949L132.861 41.4779ZM137.04 48.02C137.658 49.1396 138.247 50.2885 138.806 51.4665L140.613 50.61C140.037 49.3947 139.429 48.2089 138.791 47.053L137.04 48.02ZM23.1149 53.0346C22.8579 53.5234 23.0457 54.128 23.5345 54.3851C24.0234 54.6421 24.628 54.4543 24.8851 53.9655L23.1149 53.0346ZM142 56.5L143.799 45.0939L133.021 49.2393L142 56.5ZM24.8851 53.9655C25.1921 53.3816 25.5045 52.805 25.822 52.2356L24.0752 51.2615C23.7497 51.8453 23.4295 52.4363 23.1149 53.0346L24.8851 53.9655ZM27.7942 48.8956C28.4904 47.7814 29.2073 46.6975 29.944 45.6439L28.3049 44.4978C27.5484 45.5799 26.8123 46.6926 26.098 47.8359L27.7942 48.8956ZM32.2597 42.5122C33.0653 41.4819 33.8908 40.4838 34.7349 39.5179L33.229 38.2018C32.3608 39.1952 31.512 40.2214 30.6841 41.2804L32.2597 42.5122ZM37.368 36.6697C38.2816 35.7355 39.2139 34.8357 40.1635 33.9699L38.816 32.492C37.8381 33.3835 36.8784 34.3099 35.9381 35.2713L37.368 36.6697ZM43.1125 31.4342C44.1258 30.6132 45.1559 29.8282 46.2013 29.0789L45.0361 27.4533C43.9588 28.2256 42.8973 29.0345 41.8534 29.8803L43.1125 31.4342ZM49.4218 26.9125C50.5224 26.219 51.6372 25.5627 52.7648 24.9434L51.802 23.1904C50.6394 23.829 49.49 24.5056 48.3556 25.2205L49.4218 26.9125ZM56.2197 23.1792C57.3956 22.6228 58.5829 22.1047 59.7799 21.6247L59.0355 19.7684C57.8011 20.2634 56.5768 20.7976 55.3643 21.3713L56.2197 23.1792ZM63.4267 20.2889C64.6592 19.8794 65.8999 19.5088 67.1467 19.1769L66.6322 17.2442C65.3465 17.5865 64.0671 17.9687 62.7961 18.391L63.4267 20.2889ZM70.9266 18.2924C72.1983 18.0351 73.4743 17.8172 74.7529 17.6383L74.4757 15.6576C73.1573 15.8421 71.8414 16.0668 70.5301 16.3321L70.9266 18.2924ZM78.6116 17.2169C79.904 17.1153 81.1971 17.0531 82.4886 17.0301L82.453 15.0304C81.121 15.0541 79.7876 15.1183 78.4548 15.2231L78.6116 17.2169ZM86.37 17.0787C87.6649 17.1343 88.9563 17.2293 90.2422 17.3635L90.4497 15.3743C89.1234 15.2359 87.7914 15.1379 86.4558 15.0805L86.37 17.0787ZM94.089 17.8843C95.3663 18.0973 96.6359 18.3495 97.8958 18.6404L98.3459 16.6917C97.0458 16.3915 95.7358 16.1313 94.418 15.9115L94.089 17.8843ZM101.648 19.6307C102.888 19.9996 104.116 20.4071 105.33 20.853L106.02 18.9756C104.766 18.5152 103.498 18.0945 102.218 17.7137L101.648 19.6307ZM108.927 22.3048C110.11 22.8262 111.276 23.3855 112.425 23.9824L113.347 22.2079C112.16 21.5911 110.956 21.0133 109.734 20.4749L108.927 22.3048ZM115.807 25.8813C116.911 26.5493 117.996 27.2543 119.058 27.9959L120.203 26.3556C119.104 25.589 117.983 24.8604 116.842 24.17L115.807 25.8813ZM122.163 30.3167C123.168 31.121 124.15 31.9609 125.107 32.836L126.457 31.36C125.467 30.4551 124.452 29.5867 123.412 28.7551L122.163 30.3167ZM127.879 35.5437C128.768 36.4715 129.631 37.4331 130.467 38.4284L131.999 37.1425C131.135 36.1135 130.242 35.1192 129.323 34.1598L127.879 35.5437ZM132.861 41.4779C133.621 42.5133 134.352 43.5806 135.054 44.6794L136.74 43.603C136.015 42.4678 135.259 41.365 134.474 40.2949L132.861 41.4779ZM137.04 48.02C137.658 49.1396 138.247 50.2885 138.806 51.4665L140.613 50.61C140.037 49.3947 139.429 48.2089 138.791 47.053L137.04 48.02Z" fill="#FAFAFA"/>
            </svg>
        </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                </div>
            </div>
        </section>

        <!-- Profile Section -->
        <!-- <section class="bg-white basis-1/5 rounded shadow-lg p-6 mb-6">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Profile</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p><strong>Name:</strong> John Doe</p>
                    <p><strong>Email:</strong> john.doe@example.com</p>
                    <p><strong>Address:</strong> 123 Green Street, EcoCity</p>
                    <p><strong>Phone:</strong> +62 812 3456 7890</p>
                    <p><strong>Points:</strong> <span class="text-green-700 font-bold">1500</span></p>
                </div>
            </div>
        </section> -->

      
        <!-- Product List Section -->
        <section class="bg-white rounded shadow-lg p-6">
            <h2 class="text-2xl font-bold text-green-700 mb-4">Products for Sale</h2>
            <table class="table-auto w-full">
                <thead>
                    <tr class="bg-green-100">
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Description</th>
                        <th class="px-4 py-2">Price</th>
                        <th class="px-4 py-2">Stock</th>
                        <th class="px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody id="product-list">
                    <!-- Dynamic Product Rows -->
                </tbody>
            </table>
              <!-- Upload Product Section -->
        <section class="mb-6">
            <button 
                class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800"
                id="open-upload-modal"
            >
                Upload Product
            </button>
        </section>

        </section>

        <section>
            <div class="mb-4">
                <button id="tab-shipping" class="tab-button active">Barang Sedang Dikirim</button>
                <button id="tab-completed" class="tab-button">Selesai</button>
                <button id="tab-rated" class="tab-button">Sudah Dinilai</button>
            </div>
            <!-- Tab Content -->
            <div id="content-shipping" class="tab-content">
                <h3 class="text-xl font-bold text-green-700 mb-4">Barang Sedang Dikirim</h3>
                <ul class="list-disc pl-6">
                    <li>Order #123 - Kursi Kayu Bekas - Dalam Pengiriman</li>
                    <li>Order #124 - Laptop Second - Dalam Pengiriman</li>
                </ul>
            </div>
            <div id="content-completed" class="tab-content hidden">
                <h3 class="text-xl font-bold text-green-700 mb-4">Barang Selesai</h3>
                <ul class="list-disc pl-6">
                    <li>Order #122 - Panci Stainless - Tiba pada 20 Nov 2024</li>
                </ul>
            </div>
            <div id="content-rated" class="tab-content hidden">
                <h3 class="text-xl font-bold text-green-700 mb-4">Barang Sudah Dinilai</h3>
                <ul class="list-disc pl-6">
                    <li>Order #120 - Rak Besi - Dinilai pada 15 Nov 2024</li>
                </ul>
            </div>
        </section>

    </main>

    <footer class="bg-green-700 text-white py-4 text-center">
        <p>&copy; 2024 ecoswap. All rights reserved.</p>
    </footer>

    <!-- Upload Product Modal -->
    <div 
        id="upload-modal" 
        class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden"
    >
        <div class="bg-white rounded shadow-lg w-96 p-6">
            <h3 class="text-xl font-bold text-green-700 mb-4">Upload Product</h3>
            <form id="upload-form">
                <div class="mb-4">
                    <label class="block font-bold mb-2">Name</label>
                    <input 
                        type="text" 
                        id="product-name" 
                        class="w-full border rounded p-2" 
                        required
                    >
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Description</label>
                    <textarea 
                        id="product-description" 
                        class="w-full border rounded p-2" 
                        rows="3"
                        required
                    ></textarea>
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Price</label>
                    <input 
                        type="number" 
                        id="product-price" 
                        class="w-full border rounded p-2" 
                        required
                    >
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Stock</label>
                    <input 
                        type="number" 
                        id="product-stock" 
                        class="w-full border rounded p-2" 
                        required
                    >
                </div>
                <div class="mb-4">
                    <label class="block font-bold mb-2">Image</label>
                    <input 
                        type="file" 
                        id="product-image" 
                        class="w-full border rounded p-2"
                        accept="image/*"
                    >
                </div>
                <div class="flex justify-between">
                    <button 
                        type="button" 
                        class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700"
                        id="close-upload-modal"
                    >
                        Cancel
                    </button>
                    <button 
                        type="submit" 
                        class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-800"
                    >
                        Upload
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Modal Logic
        const uploadModal = document.getElementById('upload-modal');
        const openUploadModal = document.getElementById('open-upload-modal');
        const closeUploadModal = document.getElementById('close-upload-modal');

        openUploadModal.addEventListener('click', () => {
            uploadModal.classList.remove('hidden');
        });

        closeUploadModal.addEventListener('click', () => {
            uploadModal.classList.add('hidden');
        });

        // Handle Form Submission
        const uploadForm = document.getElementById('upload-form');
        const productList = document.getElementById('product-list');

        uploadForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const name = document.getElementById('product-name').value;
            const description = document.getElementById('product-description').value;
            const price = document.getElementById('product-price').value;
            const stock = document.getElementById('product-stock').value;

            const status = stock > 0 ? 'Available' : 'Out of Stock';

            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td class="border px-4 py-2">${name}</td>
                <td class="border px-4 py-2">${description}</td>
                <td class="border px-4 py-2">$${price}</td>
                <td class="border px-4 py-2">${stock}</td>
                <td class="border px-4 py-2">${status}</td>
            `;

            productList.appendChild(newRow);
            uploadModal.classList.add('hidden');
            uploadForm.reset();
        });
    </script>

<script>
        const tabs = document.querySelectorAll('.tab-button');
        const contents = document.querySelectorAll('.tab-content');
        tabs.forEach((tab, index) => {
            tab.addEventListener('click', () => {
                // Reset active class
                tabs.forEach(t => t.classList.remove('active'));
                contents.forEach(c => c.classList.add('hidden'));
                // Activate current tab
                tab.classList.add('active');
                contents[index].classList.remove('hidden');
            });
        });
        // Add active style
        document.querySelector('.tab-button.active').style.cssText = `
            border-bottom: 2px solid green;
            color: green;
        `;
    </script>
    <style>
        .tab-button {
            padding: 8px 16px;
            background: #e8f5e9;
            margin-right: 4px;
            border-radius: 4px;
            cursor: pointer;
        }
        .tab-button:hover {
            background: #c8e6c9;
        }
        .tab-button.active {
            border-bottom: 2px solid green;
            color: green;
        }
        .tab-content {
            padding: 16px;
            background: white;
            border-radius: 4px;
        }
    </style>

</body>
</html>
