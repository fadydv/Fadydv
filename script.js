document.addEventListener('DOMContentLoaded', function() {
    
    const toggleButton = document.getElementById('darkModeToggle');
    const body = document.body;
    
    const isDark = localStorage.getItem('dark-mode') === 'enabled';

    if (isDark) {
        body.classList.add('dark-mode');
        if (toggleButton) {
            toggleButton.textContent = '☀️ Mode Terang';
        }
    }

    if (toggleButton) {
        toggleButton.addEventListener('click', function() {
            body.classList.toggle('dark-mode');

            if (body.classList.contains('dark-mode')) {
                localStorage.setItem('dark-mode', 'enabled');
                toggleButton.textContent = '☀️ Mode Terang';
            } else {
                localStorage.setItem('dark-mode', 'disabled');
                toggleButton.textContent = '🌙 Mode Gelap';
            }
        });
    }

    const katalogList = document.getElementById('katalogList');
    
    if (katalogList) {
        const loadLipstickData = async () => {
            try {
                const response = await fetch('lipsticks.json'); 
                if (!response.ok) {
                    throw new Error(`Gagal memuat data lokal: ${response.statusText}`);
                }
                const lipsticks = await response.json();
                displayLipsticks(lipsticks);

            } catch (error) {
                console.error("Terjadi masalah saat memuat atau memproses data lipstik:", error);
                katalogList.innerHTML = '<p style="color: var(--primary-color); text-align: center;">❌ Gagal memuat katalog. Pastikan file `lipsticks.json` berada di direktori yang sama.</p>';
            }
        };

        function displayLipsticks(lipsticks) {
            let htmlContent = '<div class="katalog-grid">'; 
            
            lipsticks.forEach((item) => {
                htmlContent += `
                    <div class="lipstick-card">
                        <h3 class="card-title">${item.nama}</h3> 
                        <p class="card-brand">${item.brand}</p> 
                        
                        <p class="card-price">${item.harga}</p> 
                        <p class="card-description">${item.deskripsi}</p>
                        
                        <button class="buy-button">Beli Sekarang</button> 
                    </div>
                `;
            });
            htmlContent += '</div>'; 
            
            katalogList.innerHTML = htmlContent;
        }

        loadLipstickData();
    }

    const recoForm = document.getElementById('recommenderForm');
    const resultsContainer = document.getElementById('recommendationResult');

    if (recoForm) {
        recoForm.addEventListener('submit', function(event) {
            event.preventDefault(); 

            const skinTone = document.getElementById('skinTone').value;
            const lipType = document.getElementById('lipType').value;
            
            if (!skinTone || !lipType) {
                resultsContainer.innerHTML = '<p style="color: var(--primary-color); text-align: center; margin-top: 20px;">⚠️ Mohon lengkapi semua pilihan di atas sebelum mencari rekomendasi.</p>';
                return;
            }

            let recommendations = getRecommendation(skinTone, lipType);
            displayRecommendationResults(recommendations);
        });
    }

    function getRecommendation(skin, type) {
        let shades = [];
        let finish = '';

        if (skin === 'putih' || skin === 'kuning-langsat') {
            shades.push('Pink lembut (Rose)', 'Peach', 'Merah dengan undertone biru (Cool Red)', 'Coral');
        } else if (skin === 'sawo-matang') {
            shades.push('Mawar (Mauve)', 'Merah bata', 'Nude Karamel', 'Berry');
        } else if (skin === 'gelap') {
            shades.push('Burgundy Tua', 'Merah Anggur (Wine)', 'Cokelat Intens', 'Fuchsia');
        }

        if (type === 'kering') {
            finish = 'Satin, Glossy, atau Cream (WAJIB menghindari Matte Ultra Kering)';
        } else if (type === 'bervolume') {
            finish = 'Matte atau Stain untuk tampilan yang lebih rapi dan mengurangi dimensi bibir.';
        } else {
            finish = 'Matte, Satin, atau Glossy (tergantung preferensi Anda)';
        }
        
        return {
            shades: shades,
            finish: finish,
            match: `Warna Kulit: ${skin.toUpperCase()} & Jenis Bibir: ${type.toUpperCase()}`
        };
    }

    function displayRecommendationResults(data) {
        let shadeList = data.shades.map(shade => `<li>💄 ${shade}</li>`).join('');
        
        resultsContainer.innerHTML = `
            <div style="background-color: var(--background-medium); padding: 30px; border-radius: 10px; border: 2px solid var(--primary-color); margin-top: 30px;">
                <h3 style="color: var(--primary-color); margin-bottom: 20px;">✅ Hasil Rekomendasi Personal Anda:</h3>
                
                <h4 style="margin-top: 0; margin-bottom: 0; color: var(--text-color-dark);">Warna (Shade) yang Ideal:</h4>
                <p style="margin-top: 5px; margin-bottom: 10px;">Pilih dari kategori berikut:</p>
                
                <ul class="recommendation-list" style="margin-left: 0; padding-left: 20px; list-style-type: none;">
                    ${shadeList}
                </ul>
                
                <h4 style="margin-top: 20px; margin-bottom: 0; color: var(--text-color-dark);">Jenis Finish (Tekstur) yang Disarankan:</h4>
                
                <p class="finish-text" style="margin-top: 5px; margin-bottom: 0;">Pilih finish ${data.finish}.</p>
                
                <p style="margin-top: 25px; font-style: italic; font-size: 0.9em; list-style-type: none;">Rekomendasi ini bersifat umum. Eksplorasi selalu disarankan!</p>
            </div>
        `;
    }

});