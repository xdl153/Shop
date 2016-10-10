var module = function() {
    var e = {},
    s = {},
    r = {},
    d = {},
    t = function(s) {
        e.errorMsg = s,
        e.errorShow = !0
    },
    o = function() {
        e.userAddressList = userAddress,
        e.addUserAddress = function() {
            e.userAddressForm.submit = !0,
            e.userAddressForm.$valid && (e.userAddressForm.submit = !1, s.post(ajax_add_delivery_address, e.userAddress).success(function(s) {
                "ok" == s.status ? (e.userAddress.id = s.id, e.userAddressList.push(e.userAddress), e.userAddressForm.submit = !1, e.userAddress = {}) : t(s.failed_msg)
            }).error(function() {
                t("未知错误，请稍后再试。")
            }))
        },
        e.deleteUserAddress = function(s) {
            e.currentSelectedAddress = angular.copy(e.userAddressList[s]),
            e.currentSelectedAddress.index = s,
            e.confirmMsg = "确认要删除吗？",
            e.confirm = !0
        },
        e.cancelConfirm = function() {
            e.confirm = !1
        },
        e.submitConfirm = function() {
            var r = ajax_update_delivery_address.replace("/0/", "/" + e.currentSelectedAddress.id + "/");
            s["delete"](r).success(function(s) {
                "ok" == s.status ? e.userAddressList.splice(e.currentSelectedAddress.index, 1) : (e.showError = !0, e.errorMsg = s.failed_msg),
                e.confirm = !1
            }).error(function() {
                e.confirm = !1,
                e.showError = !0,
                e.errorMsg = "未知错误，请稍后再试。"
            })
        },
        e.editUserAddress = function(s) {
            e.currentSelectedAddress = angular.copy(e.userAddressList[s]),
            e.currentSelectedAddress.index = s,
            e.showEditUserAddress = !0,
            e.$broadcast("update-user-address")
        },
        e.cancelUserAddress = function() {
            e.showEditUserAddress = !1
        },
        e.$on("update-submit-success",
        function(s) {
            var r = s.targetScope.editUserAddress;
            e.userAddressList[r.index] = r,
            e.showEditUserAddress = !1
        }),
        e.$on("cancel-user-address",
        function(s) {
            e.showEditUserAddress = !1
        }),
        e.$on("request-error",
        function(s) {
            e.errorShow = !0,
            e.errorMsg = s.targetScope.errorMsg
        })
    };
    return {
        init: function(t, o, u, i) {
            e = t,
            s = o,
            r = u,
            d = i
        },
        userAddress: o
    }
} ();
app.controller("bodyCtrl", ["$scope", "$http", "ajaxData", "cache",
function(e, s, r, d) {
    module.init(e, s, r, d),
    module.userAddress()
}]),
app.controller("userAddressCtrl", ["$scope", "$http",
function(e, s) {
    e.$on("update-user-address",
    function(s) {
        var r = s.targetScope.currentSelectedAddress;
        e.editUserAddress = r
    }),
    e.submitUserAddress = function() {
        if (e.editUserAddressForm.submit = !0, e.editUserAddressForm.$valid) {
            e.editUserAddressForm.submit = !1;
            var r = ajax_update_delivery_address.replace("/0/", "/" + e.editUserAddress.id + "/");
            s.post(r, e.editUserAddress).success(function(s) {
                "ok" == s.status ? e.$emit("update-submit-success") : (e.errorMsg = s.failed_msg, e.$emit("request-error"))
            }).error(function() {
                e.errorMsg = "未知错误，请稍后再试。",
                e.$emit("request-error")
            })
        }
    },
    e.cancelUserAddress = function() {
        e.$emit("cancel-user-address")
    }
}]);