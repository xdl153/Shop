			var countdown=60; 
			function settime(obj) {
				if (countdown == 0) { 
					obj.removeAttribute("disabled");    
					obj.value="��ȡ��֤��"; 
					countdown = 60;
					return;
				} else {
					obj.setAttribute("disabled", true); 
					obj.value="���·���(" + countdown + ")"; 
					countdown--; 
				} 
				setTimeout(function(){
					settime(obj)
				},1000)
			}
                         //������֤��
			function yzm(){
				var sj = $("#aaa").val();
				$.ajax({
					url:'/code',
					type:'post',
					async:true,
					data:{id:sj},
                                        headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                        },
                                        success:function(data){
						if(data === 'y'){
                                                    //alert('���ͳɹ�!');
						}
					},
					error:function(){
						alert('ʧ��');
					}
				})
			}
                        //���ʧȥ�ж�ȥ���ݿ��ѯ���Ƿ��
                        $('#aaa').blur(function(){
                            //��ȡ�����ֵ
                            var sj = $("#aaa").val();
                            if(sj == ""){
                                $("#button").attr("disabled", true);
                            }
                            if(sj !== ""){
                            $.ajax({
                                url:'/demand',
                                type:'post',
                                async:true,
                                data:{phone:sj},
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(a){
                                        if(a === 'y'){
                                           $("#bbb").css("display","");
                                           $("#button").attr("disabled", true);
                                        }else{
                                           $("#yzmyzm").removeAttr("disabled");
                                           $("#ok").css("display","");
                                           $("#button").attr("disabled", true);
                                        }
                                },
                                error:function(){
                                        alert('ajaxʧ��');
                                }
                             })
                            }
                        });
                        //����������
                        $("#yzmyzm").attr({"disabled":"disabled"});
                        //����ע��
                        $("#button").attr({"disabled":"disabled"});
                        //
                        $('#aaa').focus(function(){
                            $("#bbb").css("display","none");
                        });
                        $('#aaa').focus(function(){
                            $("#ok").css("display","none");
                        });
                       
                        //����궨λ����֤���ı���
                        $('#abc').focus(function(){
                            $('#pd').css("display","none");
                        });
                        //�ж���֤��
                        $('#abc').blur(function(){
                            $('#pd').css("display","none");
                            var code = $("#abc").val();
                            if(code !== ""){
                                $.ajax({
                                url:'/demandcode',
                                type:'post',
                                async:true,
                                data:{code:code},
                                headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                },
                                success:function(a){
                                        if(a === 'y'){
                                            
                                        }else{
                                            $('#pd').css({"color":"#FF6343","font-size":"13px","line-height":"15px","display":""});
                                            $("#button").attr("disabled", true);
                                        }
                                },
                                error:function(){
                                        alert('ajaxʧ��');
                                }
                             })
                            }
                        });
                        //����궨λ�������ı���
                        $('#pwd1').focus(function(){
                            $('#mima').css("display","none");
                        });
                        $('#pwd2').blur(function(){
                            var pwd1 = $("#pwd1").val();
                            var pwd2 = $("#pwd2").val();
                            if(pwd1 === pwd2){
                                $('#mima').css("display","none");
                                $("#button").removeAttr("disabled");
                                if($("#bbb").css("display") !== 'none'){
                                    $("#button").attr("disabled", true);
                                }
                            }else{
                                $('#mima').html("��ȷ��������ͬ");
                                $('#mima').css({"display":"","color":"#FF6343","font-size":"13px","line-height":"15px"});
                                $("#button").attr("disabled", true);
                            }
                        });
                        //����ע���û�������
                        function register(){
                            //user  �ֻ�����
                            //password ����
                            var user = $("#aaa").val();
                            var pwd = $("#pwd2").val();
                                $.ajax({
                                    url:'/enroll',
                                    type:'post',
                                    async:true,
                                    data:{user:user,pwd :pwd},
                                    headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    success:function(b){
                                            if( b === 'y'){
                                                alert('ע��ɹ�');
                                                location.href = "/";
                                            }else{
                                                alert('ע��ʧ��');
                                            }
                                    },
                                    error:function(){
                                            alert('ajaxʧ��');
                                    }
                             });
                        }
                            function login(){
                            var name = $("#lPhone").val();
                            var password = $("#lPass").val();
                                $("#yhdl").html("��¼�����Ե�");
                                $("#yhdl").attr("disabled", true);
                                    $.ajax({
                                       url:'/dologin',
                                       type:'post',
                                       async:true,
                                       data:{name:name,password:password},
                                       headers: {
                                       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                       },
                                       success:function(a){
                                           if( a === 'y'){
                                               window.location.reload();
                                           }else{
                                               $("#yhdl").html("�û������������");
                                           }
                                       },
                                       error:function(){
                                           alert('ajaxʧ��');
                                       }
                                    });
                          };
                          $("#yhdl").attr("disabled", true);
                          $("#yhdl").html("�������˺�����");
                          $("#lPhone").focus(function(){
                            var name = $("#lPhone").val();
                            var password = $("#lPass").val();
                              if(name == "" && password == ""){
                                    $("#yhdl").attr("disabled", true);
                                    $("#yhdl").html("�������˺�����");
                              }
                              if(name !== "" && password !== ""){
                                    $("#yhdl").removeAttr("disabled");
                                    $("#yhdl").html("��¼");
                              }
                          });
                          $("#lPhone").blur(function(){
                            var name = $("#lPhone").val();
                            var password = $("#lPass").val();
                              if(name == "" && password == ""){
                                    $("#yhdl").attr("disabled", true);
                                    $("#yhdl").html("�������˺�����");
                              }
                              if(name !== "" && password !== ""){
                                    $("#yhdl").removeAttr("disabled");
                                    $("#yhdl").html("��¼");
                              }
                              if(name !== ""){
                                  $("#yhdl").html("����������");
                              }
                              if(name == ""){
                                  $("#yhdl").html("�������ֻ�����");
                              }
                          });
                          $("#lPass").focus(function(){
                            var name = $("#lPhone").val();
                            var password = $("#lPass").val();
                              if(password == "" && name == ""){
                                $("#yhdl").attr("disabled", true);
                                $("#yhdl").html("�������˺�����");
                              }
                              if(password !== ""){
                                $("#yhdl").removeAttr("disabled");
                                $("#yhdl").html("��¼");
                              }
                          });
                          $("#lPass").blur(function(){
                            var name = $("#lPhone").val();
                            var password = $("#lPass").val();
                              if(password == "" && name == ""){
                                $("#yhdl").attr("disabled", true);
                                $("#yhdl").html("�������˺�����");
                              }
                              if(password !== ""){
                                $("#yhdl").removeAttr("disabled");
                                $("#yhdl").html("��¼");
                              }
                          });
                          function exit(){
                              $.ajax({
                                   url:'/logout',
                                   type:'post',
                                   async:true,
                                   headers: {
                                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                   },
                                   success:function(a){
                                       if( a === 'y'){
                                           location.href = "/";
                                       }else{
                                           alert('�˳�ʧ��');
                                       }
                                   },
                                   error:function(){
                                       alert('ajaxʧ��');
                                   }
                            });
                          };