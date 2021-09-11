// This is where project configuration and plugin options are located.
// Learn more: https://gridsome.org/docs/config

// Changes here require a server restart.
// To restart press CTRL + C in terminal and run `gridsome develop`

module.exports = {
  siteName: 'Martin Pollock - Web Developer Portfolio',
  siteDescription: 'Martin Pollock`s Web Developer Portfolio',
  siteUrl: 'https://marpoocknew.github.io',
  pathPrefix: '/',
  plugins: [
    {
      use: 'gridsome-plugin-tailwindcss',
    },
    {
      use: '@gridsome/source-filesystem',
      options: {
        path: 'portfolio/**/*.md',
        typeName: 'Post',
        refs: {
          tags: {
            typeName: 'Tag',
            create: true
          }
        }
      }
    },
    // {
    //   use: 'gridsome-plugin-rss',
    //   options: {
    //     contentTypeName: 'Post',
    //     feedOptions: {
    //       title: 'Gridsome Portfolio Starter Blog',
    //       feed_url: 'https://gridsome-portfolio-starter.netlify.com/rss.xml',
    //       site_url: 'https://gridsome-portfolio-starter.netlify.com/'
    //     },
    //     feedItemOptions: node => ({
    //       title: node.title,
    //       description: node.summary,
    //       url: 'https://gridsome-portfolio-starter.netlify.com' + node.path,
    //       author: 'Andre Madarang',
    //       tags: node.tags,
    //       date: node.date,
    //       image: node.image
    //     }),
    //     output: {
    //       dir: './static',
    //       name: 'rss.xml'
    //     }
    //   }
    // },
    {
      use: '@gridsome/plugin-sitemap',
      options: {
        cacheTime: 600000, // default
      }
    },
  ],
  templates: {
    Tag: '/tag/:id'
  },
  transformers: {
    remark: {
      plugins: [
        [ 'gridsome-plugin-remark-shiki', { theme: 'Material-Theme-Palenight', skipInline: true } ]
      ],
      externalLinksTarget: '_blank',
      externalLinksRel: ['nofollow', 'noopener', 'noreferrer'],
      anchorClassName: 'icon icon-link',
    }
  },
}
