
document.addEventListener('DOMContentLoaded', function () {
    const page = window.location.pathname.split('/').pop() || 'index.html';

    // Map each filename to the top-level nav link text that should be active
    const pageMap = {
        'index.html': 'Home',
        'who-we-are.html': 'About Us',
        'principal-desk.html': 'About Us',
        'correspondent-desk.html': 'About Us',
        'curriculum.html': 'Academics',
        'admissions.html': 'Academics',
        'awards.html': 'Academics',
        'photos.html': 'Gallery',
        'videos.html': 'Gallery',
        'events.html': 'Campus Life',
        'careers.html': 'Careers',
        'contacts.html': 'Contact',
        'login.html': '',
    };

    const activeLabel = pageMap[page] || '';

    // Remove all existing active classes from top-level nav links
    document.querySelectorAll('.nav-links > li > a').forEach(function (link) {
        link.classList.remove('active');
    });

    // Also remove active from dropdown items (only top-level should show the underline)
    document.querySelectorAll('.dropdown-menu a').forEach(function (link) {
        link.classList.remove('active');
    });

    // Set active on the matching top-level link
    if (activeLabel) {
        document.querySelectorAll('.nav-links > li > a').forEach(function (link) {
            // Get text without the arrow icon text
            const linkText = Array.from(link.childNodes)
                .filter(n => n.nodeType === 3)
                .map(n => n.textContent.trim())
                .join('');

            if (linkText === activeLabel) {
                link.classList.add('active');
            }
        });
    }
});
