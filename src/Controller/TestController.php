
class TestController extends AbstractController
{
    #[Route('/test', name: 'testcontroller')]
    public function index()
    {
        return $this->render('test/index.html.twig');
    }
}
