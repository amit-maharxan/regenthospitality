<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div>
                <a class="brand" href="#home">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $image          = wp_get_attachment_image_src($custom_logo_id, 'full');
                    ?>
                    <img src="<?php echo $image[0]; ?>" alt="logo" class="logo">
                </a>
                <p data-i18n="footerCopy">Connecting emerging hospitality talent with international learning opportunities.</p>
            </div>
            <div>
                <h4 data-i18n="quickLinks">Quick links</h4>
                <?php if (is_front_page()): ?>
                    <div class="footer-links">
                        <a href="#destinations" data-i18n="navDestinations">Destinations</a>
                        <a href="#vacancies" data-i18n="navVacancies">Vacancies</a>
                        <a href="#how" data-i18n="navHow">How it works</a>
                    </div>
                <?php else: ?>
                    <div class="footer-links">
                        <a href="<?php echo home_url(); ?>#destinations" data-i18n="navDestinations">Destinations</a>
                        <a href="<?php echo home_url(); ?>#vacancies" data-i18n="navVacancies">Vacancies</a>
                        <a href="<?php echo home_url(); ?>#how" data-i18n="navHow">How it works</a>
                    </div>
                <?php endif; ?>
            </div>
            <div>
                <h4 data-i18n="contact">Contact</h4>
                <div class="footer-links"><a href="mailto:internships@example.com">internships@example.com</a><span style="font-size:13px;color:#d5c2b4" data-i18n="footerLocation">International opportunities</span></div>
            </div>
        </div>
        <div class="copyright">© <?php echo date('Y'); ?> Regent Hospitality</div>
    </div>
</footer>
<div class="toast" id="toast" role="status"></div>

<script>
    // Translation data
    const translations = {
        en: {
            topline: "International hospitality internships · Learn, grow, experience",

            navHome: "Home",
            navDestinations: "Destinations",
            navVacancies: "Vacancies",
            navHow: "How it works",
            exploreBtn: "Explore opportunities ↗",
            destinationBtn: "View destinations",
            viewOpportunitiesBtn: "View opportunities ↗",
            ctaTitle: "Ready to make your move?",
            ctaCopy: "Find an internship that helps turn your ambition into experience.",
            ctaBtn: "Explore open roles ↗",
            footerCopy: "Connecting emerging hospitality talent with international learning opportunities.",
            navDestinations: "Destinations",
            navVacancies: "Vacancies",
            navHow: "How it works",
            footerLocation: "International opportunities",
            quickLinks: "Quick links",
            contact: "Contact",
            navApply: "Find an internship",
            searchLabel: "Search roles",
            destinationLabel: "Destination",
            allDestinations: "All destinations",
            searchBtn: "Search",
            vacancyTag: "Rooms Division",
            vacancyStatus: "● Open",
            availablePositions: "available positions",
            intakes: "intake(s)",
            viewDetailsBtn: "View details →",
            noVacanciesFound: "No vacancies found."
        },
        np: {
            topline: "अन्तर्राष्ट्रिय आतिथ्य इन्टर्नशिप · सिक्नुहोस्, बढ्नुहोस् र अनुभव लिनुहोस्",

            navHome: "गृहपृष्ठ",
            navDestinations: "गन्तव्यहरू",
            navVacancies: "रोजगारीका अवसरहरू",
            navHow: "यो कसरी काम गर्छ",
            exploreBtn: "अवसरहरू शोध्नुहोस् ↗",
            destinationBtn: "गन्तव्यहरू हेर्नुहोस्",
            viewOpportunitiesBtn: "अवसरहरू हेर्नुहोस् ↗",
            ctaTitle: "तपाईंको कदम चाल्न तयार हुनुहुन्छ?",
            ctaCopy: "तपाईंको महत्वाकांक्षालाई अनुभवमा परिणत गर्न सहयोग गर्ने इन्टर्नशिप पत्ता लगाउनुहोस्।",
            ctaBtn: "खुला भूमिकाहरू अन्वेषण गर्नुहोस् ↗",
            footerCopy: "उदीयमान आतिथ्य प्रतिभालाई अन्तर्राष्ट्रिय सिकाइ अवसरहरूसँग जडान गर्दै।",
            navDestinations: "गन्तव्यहरू",
            navVacancies: "रोजगारीका अवसरहरू",
            navHow: "यो कसरी काम गर्छ",
            footerLocation: "अन्तर्राष्ट्रिय अवसरहरू",
            quickLinks: "छिटो लिंकहरू",
            contact: "सम्पर्क गर्नुहोस्",
            navApply: "इन्टर्नशिप पत्ता लगाउनुहोस्",
            searchLabel: "भूमिकाहरू खोज्नुहोस्",
            destinationLabel: "गन्तव्य",
            allDestinations: "सबै गन्तव्यहरू",
            searchBtn: "खोज्नुहोस्",
            vacancyTag: "कोठा विभाग",
            vacancyStatus: "● खुला",
            availablePositions: "उपलब्ध पदहरू",
            intakes: "इन्टेक(हरू)",
            viewDetailsBtn: "विवरण हेर्नुहोस् →",
            noVacanciesFound: "कुनै रोजगारीका अवसरहरू फेला परेन।"
        }
    };

    // Update website language
    function updateLanguage(lang) {

        // Update HTML language attribute
        document.documentElement.lang = lang === "np" ? "ne" : "en";

        // Translate all elements
        document.querySelectorAll("[data-i18n]").forEach(element => {

            const key = element.getAttribute("data-i18n");

            if (translations[lang] && translations[lang][key] !== undefined) {
                element.textContent = translations[lang][key];
            }

        });

        // Save selected language
        localStorage.setItem("language", lang);

        // Update selector
        document.getElementById("language").value = lang;
    }

    // Language selector event
    document.getElementById("language").addEventListener("change", function() {
        updateLanguage(this.value);
    });

    // Load saved language on page load
    document.addEventListener("DOMContentLoaded", function() {

        const savedLanguage = localStorage.getItem("language") || "en";

        updateLanguage(savedLanguage);

    });
</script>