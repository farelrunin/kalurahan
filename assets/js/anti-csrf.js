// automatically send CSRF token for all AJAX and POST requests

function addCsrfField(form) {
	if (form.method.toUpperCase() !== 'GET') {
		// Check if the input with the name csrfParam already exists
		let input = form.querySelector(`input[name="${csrfParam}"]`);
		if (! input) {
			input = document.createElement('input');
			input.type = 'hidden';
			input.name = csrfParam;
			input.value = getCsrfToken();

			form.append(input);
		}
	}
}

function csrf_semua_form()
{
	document.querySelectorAll('form').forEach((form) => {
		addCsrfField(form)
		form.addEventListener('submit', (e) => addCsrfField(e.target))
	})	

	document.addEventListener('submit', (e) => {
		if (e.target.nodeName === 'FORM') {
			addCsrfField(e.target)
		}
	})
}

function refreshFormCsrf() {
	$('form')
		.find('input[type="hidden"]')
		.filter(`[name="${csrfParam}"]`)
		.val($.cookie(csrfParam));
}

$(document).ready(function() {
	csrf_semua_form();

	$(document).ajaxComplete(function() {
		refreshFormCsrf();
	});

	$.ajaxPrefilter((opts, origOpts, xhr) => {
		if (!opts.crossDomain && !['HEAD', 'GET', 'OPTIONS'].includes(opts.type)) {
			const csrfToken = $.cookie(csrfParam) || csrfVal;
			if (!csrfToken) {
				return;
			}
			csrfVal = csrfToken;

			if (opts.data instanceof FormData) {
				opts.data.set(csrfParam, csrfToken);
			} else {
				const tokenName = encodeURIComponent(csrfParam);
				const tokenValue = encodeURIComponent(csrfToken);
				const tokenField = `${tokenName}=${tokenValue}`;
				const tokenPattern = new RegExp(`(^|&)${tokenName.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')}=[^&]*`, 'g');
				const data = opts.data || '';
				let tokenReplaced = false;

				opts.data = data.replace(tokenPattern, (match, separator) => {
					tokenReplaced = true;

					return separator + tokenField;
				});
				if (!tokenReplaced) {
					opts.data += `${opts.data ? '&' : ''}${tokenField}`;
				}
			}
		}
	})
})
