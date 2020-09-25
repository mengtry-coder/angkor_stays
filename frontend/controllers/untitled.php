Yii::$app->db->createCommand("SELECT *
                            FROM rate
                            WHERE accommodation_id = $acc_id
                            AND date >= '$check_in'
                            AND date <= '$check_out'
                            GROUP BY price
                            ")->queryOne();

                            
                    var str = "<p style='color: red;'>"+data.promotion+" % OFF</p>" +
                    "<p>USD <del>"+data.price+"</del> | "+data.price+" USD</p>";
                    $(".price_payment").append(str);
                    console.log(str);