Lënda: Siguria e të dhënave 
Prof. Dr. Blerim Rexha      PhD. C Mërgim H. Hoti
Tema e projektit: Përdorimi i DES për të mbështjellur network stream. Implementimi i një çifti klient/server të thjeshtë për të komunikuar në këtë mënyrë.
Përshkrimi i projektit: Fillimisht cekim se për punimin e projektit kemi përdorur HTML, JavaScript, PHP. Gjatë punimit të projektit kemi përdor librarinë e gatshme të Javascript-it për enkriptim dhe deenkriptim CryptoJs. Kjo librari përdoret për të enkriptuar dhe deenkriptuar të dhëna në browser në anë të klientit. CryptoJS mund të përdoret për të kriptuar dhe dekriptuar të dhëna me shumë algoritme kriptografike ndër to edhe DES algoritmi. 
Zhvillimi i projektit: Në fillim te server.php e marrim çelësin dhe mesazhin të cilin e enkriptojmë e pastaj e thërrasim në filen tjetër insert.php ku edhe ruhen në databazë. Nëse një gabim ndodh gjatë ndërveprimit me bazën e të dhënave, mesazhi gabim do të shfaqet. Nëse procesi është i suksesshëm, do të shfaqet një mesazh suksesi.Ndërsa në file-n client.php e bëjmë përcaktimin e çelësit, pastaj thirret file tjetër get.php ku nga databaza arrijmë t’i marim mesazhet e në fund client.php i deenkripton secilin mesazh. Te file get.php kodi kontrollon kërkesën POST, lidh bazën e të dhënave, merr të dhënat e kërkuara, kryen kërkimin në bazën e të dhënave, dhe shfaq rezultatet në një tabelë ose një mesazh në rast se nuk ka asnjë rezultat. Ndërsa te file client.php kodi krijon një site për të kërkuar dhe shfaqur mesazhe nga një bazë të dhënash. Kur përdoruesi vendos një çelës 8-shifror dhe shton kërkesën, kodi bën një kërkesë POST në file-n "get.php" duke dërguar çelësin si një parametër të POST-it. Në file-n "get.php", kodi lidhet me bazën e të dhënave dhe kërkon mesazhet me këtë çelës. Nëse ndonjë mesazh gjendet, ato shfaqen në një tabelë në site. Më pas, kodi përdor librarin CryptoJS për të dekriptuar mesazhet të cilat janë ruajtur në bazën e të dhënave duke përdorur çelësin e dhënë nga përdoruesi. Mesazhet e dekriptuara pastaj shfaqen në tabelë në site.
Projektin e punuan: 
•	Eljon Shala,
•	Elma Ahmeti,
•	Elonita Krasniqi.