window.fbAsyncInit = function () {
    FB.init({
        appId: '640961876010371',
        xfbml: true,
        version: 'v2.3',
        cookie: true,
        xfbml: true,
    });

    checkLoginState()
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function login() {
    FB.login(function (response) {
        if (response.authResponse) {
            console.log('Welcome! Fetching your information.... ');
            FB.api('/me', function (response) {
                console.log('Good to see you, ' + response.name + '.');
                console.log(response);
            });
        } else {
            console.log('User cancelled login or did not fully authorize.');
        }
    }, {scope: 'public_profile,email,manage_pages,publish_actions'}
    );
}
function checkLoginState() {
    FB.getLoginStatus(function (response) {
        if (response.status !== 'connected') {
            login();
        } else {
            var userId = response.authResponse.userID;
            var accessToken = response.authResponse.accessToken;

            listaPaginas(userId, accessToken)
        }
    });

}

function logout() {
    FB.logout(function (response) {
    });
}

function listaPaginas(userId, accessToken) {
    FB.api(
        "/" + userId + '/accounts',
        function (response) {
            console.log(response.data);
            var teste = response.data;

            teste.forEach(function (pages) {
                var pageAccessToken = pages.access_token;
                var pageId = pages.id;
                var pageName = pages.name;

                postaPagina(pageId, pageAccessToken)
            });
        }
    );

}

function postaPagina(pageId, accessToken) {
    console.log('chegou');
    FB.api(
            "/"+pageId+"/feed",
            "POST",
            {
                "message": "This is a test message"
            },
    function (response) {
        if (response && !response.error) {
            console.log(response)
        }
    }
    );
}