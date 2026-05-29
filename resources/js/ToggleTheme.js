function initTheme() {
    const themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
    const themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");
    const themeToggleBtn = document.getElementById("theme-toggle");

    if (!themeToggleBtn) return;

    // Set icons based on current theme
    if (document.documentElement.classList.contains("dark")) {
        themeToggleLightIcon?.classList.remove("hidden");
        themeToggleDarkIcon?.classList.add("hidden");
    } else {
        themeToggleDarkIcon?.classList.remove("hidden");
        themeToggleLightIcon?.classList.add("hidden");
    }

    // Remove existing event listener to avoid duplicates if this script runs multiple times (e.g. with Livewire)
    themeToggleBtn.onclick = null;

    themeToggleBtn.onclick = function () {
        // toggle icons inside button
        themeToggleDarkIcon?.classList.toggle("hidden");
        themeToggleLightIcon?.classList.toggle("hidden");

        // Toggle theme
        if (document.documentElement.classList.contains("dark")) {
            document.documentElement.classList.remove("dark");
            localStorage.setItem("color-theme", "light");
        } else {
            document.documentElement.classList.add("dark");
            localStorage.setItem("color-theme", "dark");
        }
    };
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', initTheme);

// Initialize on Livewire navigation
document.addEventListener('livewire:navigated', initTheme);
