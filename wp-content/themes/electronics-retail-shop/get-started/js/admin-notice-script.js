jQuery(document).ready(function ($) {
    // Attach click event to the dismiss button
    $(document).on('click', '.notice[data-notice="get-start"] button.notice-dismiss', function () {
        // Dismiss the notice via AJAX
        $.ajax({
            type: 'POST',
            url: ajaxurl,
            data: {
                action: 'electronics_retail_shop_dismissed_notice',
            },
            success: function () {
                // Remove the notice on success
                $('.notice[data-notice="example"]').remove();
            }
        });
    });
});

// WordClever – AI Content Writer plugin activation
document.addEventListener('DOMContentLoaded', function () {
    const electronics_retail_shop_button = document.getElementById('install-activate-button');

    if (!electronics_retail_shop_button) return;

    electronics_retail_shop_button.addEventListener('click', function (e) {
        e.preventDefault();

        const electronics_retail_shop_redirectUrl = electronics_retail_shop_button.getAttribute('data-redirect');

        // Step 1: Check if plugin is already active
        const electronics_retail_shop_checkData = new FormData();
        electronics_retail_shop_checkData.append('action', 'check_wordclever_activation');

        fetch(installWordcleverData.ajaxurl, {
            method: 'POST',
            body: electronics_retail_shop_checkData,
        })
        .then(res => res.json())
        .then(res => {
            if (res.success && res.data.active) {
                // Plugin is already active → just redirect
                window.location.href = electronics_retail_shop_redirectUrl;
            } else {
                // Not active → proceed with install + activate
                electronics_retail_shop_button.textContent = 'Installing & Activating...';

                const electronics_retail_shop_installData = new FormData();
                electronics_retail_shop_installData.append('action', 'install_and_activate_wordclever_plugin');
                electronics_retail_shop_installData.append('_ajax_nonce', installWordcleverData.nonce);

                fetch(installWordcleverData.ajaxurl, {
                    method: 'POST',
                    body: electronics_retail_shop_installData,
                })
                .then(res => res.json())
                .then(res => {
                    if (res.success) {
                        window.location.href = electronics_retail_shop_redirectUrl;
                    } else {
                        alert('Activation error: ' + (res.data?.message || 'Unknown error'));
                        electronics_retail_shop_button.textContent = 'Try Again';
                    }
                })
                .catch(error => {
                    alert('Request failed: ' + error.message);
                    electronics_retail_shop_button.textContent = 'Try Again';
                });
            }
        })
        .catch(error => {
            alert('Check request failed: ' + error.message);
        });
    });
});
