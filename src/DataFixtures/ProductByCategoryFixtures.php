<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Categoryprod;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ProductByCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

       $c1 = new Categoryprod();
       $c1->setLibelle("Pâtisserie");
       $manager->persist($c1);

       $c2 = new Categoryprod();
       $c2->setLibelle("Boulangerie");
       $manager->persist($c2);

       $c3 = new Categoryprod();
       $c3->setLibelle("Viennoiserie");
       $manager->persist($c3);

       $c4 = new Categoryprod();
       $c4->setLibelle("Sandwich");
       $manager->persist($c4);

       $c5 = new Categoryprod();
       $c5->setLibelle("Salade");
       $manager->persist($c5);

       $c6 = new Categoryprod();
       $c6->setLibelle("Wrap");
       $manager->persist($c6);

       //Produit Pâtisserie
        $p1 = new Product();
        $p1->setName("Baba")
            ->setDescription('Fait maison')
            ->setPrice('2.50')
            ->setImage('patisserie/baba.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p1); 

        $p2 = new Product();
        $p2->setName("Eclair au café")
            ->setDescription('Fait maison')
            ->setPrice('2.50')
            ->setImage('patisserie/eclaircafe.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p2); 

        $p3 = new Product();
        $p3->setName("Eclair au chocolat")
            ->setDescription('Fait maison')
            ->setPrice('2.50')
            ->setImage('patisserie/eclairchoco.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p3); 

        $p4 = new Product();
        $p4->setName("Fraisier")
            ->setDescription('Fait maison')
            ->setPrice('25.00')
            ->setImage('patisserie/fraisier.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p4); 

        $p5 = new Product();
        $p5->setName("Kouign amann")
            ->setDescription('Fait maison')
            ->setPrice('2.50')
            ->setImage('patisserie/kouin.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p5); 
      
        $p6 = new Product();
        $p6->setName("Millefeuille")
            ->setDescription('Fait maison')
            ->setPrice('3.20')
            ->setImage('patisserie/millefeuilles.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p6); 

        $p7 = new Product();
        $p7->setName("Opéra")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('patisserie/opera.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p7); 

        $p8 = new Product();
        $p8->setName("Paris-Brest")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('patisserie/parisbrest.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p8); 

        $p9 = new Product();
        $p9->setName("Religieuse au café")
            ->setDescription('Fait maison')
            ->setPrice('4.00')
            ->setImage('patisserie/religieusecafe.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p9); 

        $p10 = new Product();
        $p10->setName("Religieuse au chocolat")
            ->setDescription('Fait maison')
            ->setPrice('4.00')
            ->setImage('patisserie/religieusechoco.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p10); 

        $p11 = new Product();
        $p11->setName("Saint-Honoré")
            ->setDescription('Fait maison')
            ->setPrice('25.00')
            ->setImage('patisserie/sainthonore.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p11); 

        $p12 = new Product();
        $p12->setName("Tarte au citron")
            ->setDescription('Fait maison')
            ->setPrice('3.60')
            ->setImage('patisserie/tartecitron.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p12); 

        $p13 = new Product();
        $p13->setName("Tarte Tatin")
            ->setDescription('Fait maison')
            ->setPrice('28.00')
            ->setImage('patisserie/tartetatin.jpg')
            ->setCategoryprod($c1);
        $manager->persist($p13); 

        // Boulangerie tous les pains et baguettes

        $p14 = new Product();
        $p14->setName("Baguette")
            ->setDescription('Fait maison')
            ->setPrice('0.90')
            ->setImage('boulangerie/baguette.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p14); 

        $p15 = new Product();
        $p15->setName("Tradition")
            ->setDescription('Fait maison')
            ->setPrice('0.95')
            ->setImage('boulangerie/paintradition.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p15);

        $p16 = new Product();
        $p16->setName("Baguette aux céréales")
            ->setDescription('Fait maison')
            ->setPrice('0.95')
            ->setImage('boulangerie/paintradition.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p16);

        $p17 = new Product();
        $p17->setName("Pain au son")
            ->setDescription('Fait maison')
            ->setPrice('1.10')
            ->setImage('boulangerie/painauson.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p17);

        $p18 = new Product();
        $p18->setName("Pain bio")
            ->setDescription('Fait maison')
            ->setPrice('1.10')
            ->setImage('boulangerie/painbio.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p18);

        $p19 = new Product();
        $p19->setName("Pain de campagne")
            ->setDescription('Fait maison')
            ->setPrice('1.35')
            ->setImage('boulangerie/paincampagne.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p19);

        $p20 = new Product();
        $p20->setName("Pain complet")
            ->setDescription('Fait maison')
            ->setPrice('1.25')
            ->setImage('boulangerie/paincomplet.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p20);

        $p21 = new Product();
        $p21->setName("Pain de mie")
            ->setDescription('Fait maison')
            ->setPrice('1.10')
            ->setImage('boulangerie/paindemie.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p21);

        $p22 = new Product();
        $p22->setName("Pain au son")
            ->setDescription('Fait maison')
            ->setPrice('1.10')
            ->setImage('boulangerie/painauson.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p22);

        $p23 = new Product();
        $p23->setName("Pain maison")
            ->setDescription('Fait maison')
            ->setPrice('1.80')
            ->setImage('boulangerie/painmaison.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p23);

        $p24 = new Product();
        $p24->setName("Pain au seigle")
            ->setDescription('Fait maison')
            ->setPrice('1.85')
            ->setImage('boulangerie/painseigle.jpg')
            ->setCategoryprod($c2);
        $manager->persist($p24);

        //Viennoiserie
        $p25 = new Product();
        $p25->setName("Brioche")
            ->setDescription('Fait maison')
            ->setPrice('1.45')
            ->setImage('viennoiserie/brioche.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p25);

        $p26 = new Product();
        $p26->setName("Cannelé")
            ->setDescription('Fait maison')
            ->setPrice('1.10')
            ->setImage('viennoiserie/cannele.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p26);

        $p27 = new Product();
        $p27->setName("Chausson aux pommes")
            ->setDescription('Fait maison')
            ->setPrice('1.10')
            ->setImage('viennoiserie/chaussonpomme.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p27);

        $p28 = new Product();
        $p28->setName("Chouquette")
            ->setDescription('Fait maison')
            ->setPrice('0.70')
            ->setImage('viennoiserie/chouquette.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p28);

        $p29 = new Product();
        $p29->setName("Croissant")
            ->setDescription('Fait maison')
            ->setPrice('1.05')
            ->setImage('viennoiserie/croissant.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p29);

        $p30 = new Product();
        $p30->setName("Croissant aux amandes")
            ->setDescription('Fait maison')
            ->setPrice('1.75')
            ->setImage('viennoiserie/croissantamandes.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p30);

        $p31 = new Product();
        $p31->setName("Macaron")
            ->setDescription('Fait maison')
            ->setPrice('1.55')
            ->setImage('viennoiserie/macaron.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p31);

        $p32 = new Product();
        $p32->setName("Pain au chocolat")
            ->setDescription('Fait maison')
            ->setPrice('1.20')
            ->setImage('viennoiserie/painchoco.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p32);

        $p33 = new Product();
        $p33->setName("Pain aux raisins")
            ->setDescription('Fait maison')
            ->setPrice('1.55')
            ->setImage('viennoiserie/painraisins.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p33);

        $p34 = new Product();
        $p34->setName("Pain Suisse")
            ->setDescription('Fait maison')
            ->setPrice('1.95')
            ->setImage('viennoiserie/painsuisse.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p34);

        $p35 = new Product();
        $p35->setName("Torsade")
            ->setDescription('Fait maison')
            ->setPrice('1.55')
            ->setImage('viennoiserie/torsade.jpg')
            ->setCategoryprod($c3);
        $manager->persist($p35);

        // Sandwich 
        $p36 = new Product();
        $p36->setName("CheeseBurger")
            ->setDescription('Fait maison')
            ->setPrice('3.90')
            ->setImage('sandwich/chesseburger.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p36);

        $p37 = new Product();
        $p37->setName("Hotdog")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/hotdog.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p37);

        $p38 = new Product();
        $p38->setName("Sandwich Végétarien")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandiwch-vegetarien.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p38);

        $p39 = new Product();
        $p39->setName("Americain")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichamericain.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p39);

        $p40 = new Product();
        $p40->setName("Sandwich Cannibale")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichcannibale.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p40);

        $p41 = new Product();
        $p41->setName("Sandwich club")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichclub.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p41);

        $p42 = new Product();
        $p42->setName("Le jambon")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichjambon.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p42);

        $p43 = new Product();
        $p43->setName("Le jambon")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichjambon.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p43);

        $p44 = new Product();
        $p44->setName("Sandwich kebab")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichkebab.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p44);

        $p45 = new Product();
        $p45->setName("Sandwich Norvégien")
            ->setDescription('Fait maison')
            ->setPrice('3.10')
            ->setImage('sandwich/sandwichnorvegien.jpg')
            ->setCategoryprod($c4);
        $manager->persist($p45);

            // salades
        $p46 = new Product();
        $p46->setName("Salade César")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladecesar.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p46);

        $p47 = new Product();
        $p47->setName("Salade au chèvre")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladechevre.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p47);

        $p48 = new Product();
        $p48->setName("Salade aux crevettes")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladecrevette.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p48);

        $p49 = new Product();
        $p49->setName("Salade Italienne")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladeitalienne.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p49);

        $p50 = new Product();
        $p50->setName("Salade Mexicaine")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/salademexicaine.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p50);

        $p51 = new Product();
        $p51->setName("Salade Niçoise")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladenicoise.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p51);

        $p52 = new Product();
        $p52->setName("Salade Norvégienne")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladenorvegienne.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p52);

        $p53 = new Product();
        $p53->setName("Salade de riz")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/saladeriz.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p53);

        $p54 = new Product();
        $p54->setName("Salade Grec")
            ->setDescription('Fait maison')
            ->setPrice('4.20')
            ->setImage('salade/salagrecque.jpg')
            ->setCategoryprod($c5);
        $manager->persist($p54);

        //Wrap
        $p55 = new Product();
        $p55->setName("Wrap o Fish")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('wrap/wrapfish.jpg')
            ->setCategoryprod($c6);
        $manager->persist($p55);

        $p56 = new Product();
        $p56->setName("Wrap Gaulois")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('wrap/wrapgaulois.jpg')
            ->setCategoryprod($c6);
        $manager->persist($p56);

        $p57 = new Product();
        $p57->setName("Wrap jambon")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('wrap/wrapjambon.jpg')
            ->setCategoryprod($c6);
        $manager->persist($p57);

        $p58 = new Product();
        $p58->setName("Wrap saumon")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('wrap/wrapsaumon.jpg')
            ->setCategoryprod($c6);
        $manager->persist($p58);

        $p59 = new Product();
        $p59->setName("Wrap Turc")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('wrap/wrapturc.jpg')
            ->setCategoryprod($c6);
        $manager->persist($p59);

        $p60 = new Product();
        $p60->setName("Wrap végétarien")
            ->setDescription('Fait maison')
            ->setPrice('3.80')
            ->setImage('wrap/wrapvegetarien.jpg')
            ->setCategoryprod($c6);
        $manager->persist($p60);

        $manager->flush();
    }
}
