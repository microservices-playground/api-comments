<?php

namespace LegacyBundle\Command;

use AppBundle\Entity\Author;
use AppBundle\Entity\Comment;
use AppBundle\Entity\Mention;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class LegacyDataCopyFromLegacyDbCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('legacy:data:copy-from-legacy-db')
            ->setDescription('Copy data from legacy database')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $defaultEntityManager = $this->getContainer()->get('doctrine.orm.default_entity_manager');
        $legacyEntityManager = $this->getContainer()->get('doctrine.orm.legacy_entity_manager');
        $legacyCommentsRepository = $legacyEntityManager->getRepository('LegacyBundle:Comment');
        $authorRepository = $defaultEntityManager->getRepository('AppBundle:Author');

        $legacyComments = $legacyCommentsRepository->findAll();

        $progress = new ProgressBar($output, count($legacyComments));
        $progress->start();
        $progress->setFormat(' %current%/%max% [%bar%] %percent:3s%% %message%');
        $progress->setMessage('Copying legacy data');

        foreach ($legacyComments as $legacyComment) {
            $userId = $legacyComment->getUser()->getId();
            $author = $authorRepository->findOneBy(['userId' => $userId]);

            if (null === $author) {
                $author = new Author();
                $author->setUserId($legacyComment->getUser()->getId());
                $author->setUsername($legacyComment->getUser()->getUsername());
                $author->setAvatarFilename('test.jpg');

                $defaultEntityManager->persist($author);
                $defaultEntityManager->flush($author);
            }

            $comment = new Comment();
            $comment->setId($legacyComment->getId());
            $comment->setPostId($legacyComment->getPostId());
            $comment->setContent($legacyComment->getContent());
            $comment->setCreatedAt($legacyComment->getCreatedAt());
            $comment->setActive($legacyComment->getActive());
            $comment->setAuthor($author);

            foreach ($legacyComment->getMentions() as $legacyMention) {
                $mention = new Mention();
                $mention->setId($legacyMention->getId());
                $mention->setUserId($legacyMention->getUser()->getId());

                $comment->addMention($mention);
            }

            $defaultEntityManager->persist($comment);
            $progress->advance();
        }

        $defaultEntityManager->flush();

        $progress->setMessage('Data has been copied');
        $progress->finish();
        $output->writeln('');
    }
}
