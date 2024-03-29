<?php


namespace App\Tests\Controller;


use App\Entity\Framework;
use App\Entity\FrameworkType;
use App\Entity\Study;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Throwable;

/**
 * Class BaseTestCase
 *
 * @package App\Tests\Controller
 */
class BaseTestCase extends WebTestCase
{
    protected static KernelBrowser $client;

    public static function setUpBeforeClass(): void
    {
        self::$client = static::createClient();

        /** @var EntityManagerInterface $e_manager */
        $e_manager = null;

        try { // Regenera las tablas con todas las entidades mapeadas
            $e_manager = self::bootKernel()
                ->getContainer()
                ->get('doctrine')
                ->getManager();

            $metadata = $e_manager
                ->getMetadataFactory()
                ->getAllMetadata();
            $sch_tool = new SchemaTool($e_manager);
            $sch_tool->dropDatabase();
            $sch_tool->updateSchema($metadata, true);
        } catch(Throwable $e) {
            fwrite(STDERR, 'EXCEPCIÓN: ' . $e->getCode() . ' - ' . $e->getMessage());
            exit(1);
        }

        // Insertar datos de prueba
        $study_es = new Study('Bachillerato', 'IES Cañada Real', 6.8, '2014-2016', 'ES');
        $study_en = new Study('High School', 'IES Cañada Real', 6.8, '2014-2016', 'EN');
        $framework_1 = new Framework(3.5, 1, FrameworkType::FRONT_END, 'Angular');
        $framework_2 = new Framework(2.5, 0.5, FrameworkType::FRONT_END, 'Android Studio');

        $e_manager->persist($study_es);
        $e_manager->persist($study_en);
        $e_manager->persist($framework_1);
        $e_manager->persist($framework_2);
        $e_manager->flush();
    }
}