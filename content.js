// content.js

document.addEventListener('DOMContentLoaded', function () {
    const body = document.body;

    applySingleDiagonalWaveBackground();

    function applySingleDiagonalWaveBackground() {
        body.style.background = `linear-gradient(45deg, 
            #E6E6E6 0%, #E6E6E6 12.5%, 
            #F2F2F2 12.5%, #F2F2F2 25%, 
            #D9D9D9 25%, #D9D9D9 37.5%, 
            #CCCCCC 37.5%, #CCCCCC 50%, 
            #F5F5F5 50%, #F5F5F5 62.5%, 
            #D3D3D3 62.5%, #D3D3D3 75%, 
            #B0B0B0 75%, #B0B0B0 87.5%, 
            #808080 87.5%, #808080 100%)`;

        // Add space for content by adjusting the body padding
        body.style.padding = '1px';
    }
});
