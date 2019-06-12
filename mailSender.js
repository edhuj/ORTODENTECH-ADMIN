exports.get = function(request, response) {
    var nodemailer = require('nodemailer');
    var fs = require('fs');

    try {
        request.azureMobile.user.getIdentity("aad").then(function(data) {
            var mail = data.aad.user_id;

            var transporter = nodemailer.createTransport({
                host: "smtp-mail.outlook.com", // hostname
                secureConnection: false, // TLS requires secureConnection to be false
                port: 587, // port for secure SMTP
                tls: {
                    ciphers: 'SSLv3'
                },
                auth: {
                    user: 'victor.palomino@telefonica.com',
                    pass: 'Mayo2019'
                }
            });

            var jsonResponse = {
                planta_fija: [],
                planta_movil: [],
                planta_avanzada: []
            };
            console.log("invocando plantas");
            var query = {
                sql: 'select * from cobranzas.recibo_digital where numero_recibo = @ruc',
                parameters: [
										{
                        name: 'ruc',
                        value: request.query.ruc
                    }
                ]
            };
            request.azureMobile.data.execute(query)
                .then(function(results) {
                    var planta_movil = [];
                    var planta_avanzada = [];
                    var planta_fija = [];
                    for (var x = 0; x < results.length; x++) {
                        if (results[x].TIPO_SERVICIO == 'MOV') {
                            jsonResponse.planta_movil.push(results[x]);
                        }
												else if (results[x].TIPO_SERVICIO == 'A') {
                            jsonResponse.planta_avanzada.push({
                                NUM_RUC: results[x].RUC,
                                COD_CLIE: results[x].TELEFONO,
                                SERVICIO_HOMOLOGADO: results[x].TIP_LIN,
                            });
                        }

                    }
                    response.status(200).send(JSON.stringify(jsonResponse));
                    console.log(jsonResponse);

                    console.log('lenght ' + jsonResponse.planta_movil.length);
										tablaMovil = "";
                    console.log('Tabla movil ' + tablaMovil);
                    for(i=0; i<jsonResponse.planta_movil.lenght; i++){
                      console.log('Holaa '+i);
                    }
										for(i=0; i<jsonResponse.planta_movil.lenght; i++){
                      console.log(i);
											tablaMovil += '<tr style="border-collapse:collapse;">';
											tablaMovil += '<td style="padding:0;Margin:0;width:144px;text-align:center;">&nbsp;${{$CUENTA_ANEXO}}</td>'.replace("${{$CUENTA_ANEXO}}",jsonResponse.planta_movil[i].CUENTA_ANEXO);
											tablaMovil += '<th style="padding:0;Margin:0;width:144px;text-align:center;">{{$CANTIDAD_LINEAS}}</th>'.replace("{{$CANTIDAD_LINEAS}}", jsonResponse.planta_movil.length);
											tablaMovil += '<th style="padding:0;Margin:0;width:95px;text-align:center;">{{$MONTO}}</th>'.replace('{{$MONTO}}', jsonResponse.planta_movil[i].MONEDA+jsonResponse.planta_movil[i].MONTO_TOTAL);
											tablaMovil += '<th style="padding:0;Margin:0;width:151px;text-align:center;">{{$FECHA_EMISION}}</th>'.replace('{{$FECHA_EMISION}}', jsonResponse.planta_movil[i].FECHA_EMISION);
											tablaMovil += '<th style="padding:0;Margin:0;width:198px;text-align:center;">{{$FECHA_VENCIMIENTO}}</th>'.replace('{{$FECHA_VENCIMIENTO}}', jsonResponse.planta_movil[i].FECHA_VENCIMIENTO);
											tablaMovil += '</tr>';
										}
										try {
                        fs.readFile('api/receipt_template.html', 'utf8', function(err, data) {
                            if (err) throw err;

                            console.log('procesndo');
                            // setup e-mail data, even with unicode symbols
                            var mailOptions = {
                            	from: '"Punku Team" <soporte.negocios.peru@telefonica.com>', // sender address (who sends)
                              to: 'edgar.huaranga@telefonica.com', // list of receivers (who receives)
                              subject: 'Detalle Facturacion: ', // Subject line
                              text: 'Hello world', // plaintext body
                              html: data.
																		replace("${RAZON_SOCIAL}", request.query.razon).
																		replace("${RUC}", request.query.ruc).
																		replace("${NOMBRE_EECC_AV}", request.query.movil).
																		replace("${BODY_TABLE_MOVILES}", tablaMovil), // html body
                            };

                            /*var mailOptions = {
                            	from: 'soporte.negocios.peru@telefonica.com', // sender address (who sends)
                              to: mail, // list of receivers (who receives)
                              subject: 'Detalle Facturacion: ' + request.query.ruc, // Subject line
                              text: 'Hello world ', // plaintext body
                              html: data.replace("${ruc}", request.query.ruc).replace("${razonSocial}", request.query.razon).replace("${facturacionMovil}", request.query.movil).replace("${facturacionFija}", request.query.fija).replace("${facturacionAvanzada}", request.query.avanzada).replace("${fechaMovil}", request.query.femovil).replace("${fechaFija}", request.query.fefija).replace("${fechaAvanzada}", request.query.feavanzada), // html body
                              attachments: [
																{ // define custom content type for the attachment
                                	filename: request.query.ruc + '_detalle_facturacion.xlsx',
                                	content: buffer
                                }
                              ]
                            };*/

                            transporter.sendMail(mailOptions, function(error, info) {
                            	if (error) {
																return console.log(error.responseCode);
                            	}
                            	console.log('Message sent: ' + info.response);
                            });

                        });

                    }
										catch (e) {
                        console.log(e.message);
                    }

                });
        });

    } catch (e) {
    	response.status(500).send("{\"error\":\"error\"}");
    }
};
